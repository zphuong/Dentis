<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Mail;
use Imagick;
use Session;
use Carbon\Carbon;
use App\Models\Card;
use App\Models\Product;
use App\Models\insurance;
use App\Mail\InsuranceMail;
use Illuminate\Http\Request;
use App\Http\Requests\InsuranceRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InsuranceController extends Controller
{   
    public function add(){
        $product = Product::select('id','product_name')->get();
        $time_now = strtotime(Carbon::now()->format('d-m-Y'));
        $customer = insurance::where('end_date','>',$time_now)->orderby('id','desc')->paginate(10);
        foreach ($customer as $key => &$value) {
            $value['so_ngay']   = ceil(($value['end_date'] - $time_now)/84600);
            $value['end_date']  = date('d/m/Y', $value['end_date']);
        }
        return view('admin.insurance.add')
        ->with('product',$product)
        ->with('data', $customer);
    }

    public function all(){
        $time_now = strtotime(Carbon::now()->format('d-m-Y'));
        $customer = insurance::select('insurance.id','name','phone','code','insurance.description','start_date','end_date','product_name')
        ->where('end_date','>',$time_now)
        ->join('product','product.id','=','insurance.id_product')
        ->orderby('id','desc')
        ->paginate(20);

        foreach ($customer as $key => &$value) {
            $time_now = strtotime(Carbon::now()->format('d-m-Y'));
            $value['so_ngay']   = ceil(($value['end_date'] - $time_now)/84600);
            $value['end_date']  = date('d/m/Y', $value['end_date']);
        }

        return view('admin.insurance.customer')->with('data',$customer);
        $qrData = insurance::select('name','code')->where('id',$id)->first();
        $qrCode = base64_encode(QrCode::size(250)->format('png')->generate('http://nhakhoa.test/tra-cuu?code='.$qrData['code']));
    }

    public function contact(){
        $customer = DB::table('customer')->orderby('status', 'asc')->paginate(20);
        return view('admin.insurance.contact')
        ->with('customer',$customer);
    }

    public function oldCustomer(){
        $time_now = strtotime(Carbon::now()->format('d-m-Y'));
        $customer = insurance::select('insurance.id','name','phone','code','insurance.description','start_date','end_date','product_name')
        ->where('end_date','<',$time_now)
        ->join('product','product.id','=','insurance.id_product')
        ->orderby('id','desc')
        ->paginate(20);
        foreach ($customer as $key => &$value) {
            $time_now = strtotime(Carbon::now()->format('d-m-Y'));
            $value['end_date']  = date('d/m/Y', $value['end_date']);
        }
        return view('admin.insurance.oldcustomer')
        ->with('data',$customer);
    }

    public function addInsurance(InsuranceRequest $request){
        $data = new insurance();
        $data['code']           = $request->input('code');
        $data['name']           = $request->input('name');
        $data['phone']          = $request->input('phone');
        $data['email']          = $request->input('email');
        $data['address']        = $request->input('address');
        $data['id_product']     = $request->input('id_product');
        $data['start_date']     = strtotime(Carbon::now()->format('d-m-Y'));
        $data['end_date']       = strtotime(str_replace("/", "-",$request->input('end_date')));
        $data['description']    = $request->input('description');

        $mail_data = new \stdClass();
        $mail_data->code = $data['code'];
        $mail_data->name = $data['name'];
        $mail_data->email = $data['email'];
        $mail_data->phone = $data['phone'];
        $mail_data->description = $data['description'];
        $mail_data->start_date = Carbon::now()->format('d/m/Y');
        $mail_data->end_date = $request->input('end_date');
        $mail_data->product = Product::select('product_name')->where('id',$data['id_product'])->first();

        $product = Product::select('id','product_name')->get();

        $amount = array();
        $amount['amount'] = Card::find(1)->amount;
        if( $amount['amount'] < 1 ){
            echo "Thẻ bảo hành đã hết";
        }
        else{
            $amount['amount'] = $amount['amount'] - 1;
            Card::where('id',1)->update($amount);
            Mail::to($mail_data->email)->send(new InsuranceMail($mail_data));
            $data->save();
            Session::put('status', 'Thêm bảo hàng thành công');
            return back();
        }
    }   

    public function getEdit(Request $request, $id){
        $product                = Product::select('id','product_name')->get();
        $data_user              = insurance::find($id);
        $data_user['end_date']  = date('d/m/Y',$data_user['end_date']);

        $customer = insurance::whereColumn('end_date','>','start_date')->orderby('id','desc')->paginate(10);
        foreach ($customer as $key => &$value) {
            $time_now = strtotime(Carbon::now()->format('d-m-Y'));
            $value['so_ngay']   = ceil(($value['end_date'] - $time_now)/84600);
            $value['end_date']  = date('d/m/Y', $value['end_date']);
        }

        return view('admin.insurance.edit')
        ->with('dataUser', $data_user)
        ->with('product',$product)
        ->with('data',$customer);
    }

    public function postEdit(InsuranceRequest $request, $id){
        $data['code']           = $request->input('code');
        $data['name']           = $request->input('name');
        $data['phone']          = $request->input('phone');
        $data['email']          = $request->input('email');
        $data['address']        = $request->input('address');
        $data['id_product']     = $request->input('id_product');
        $data['end_date']       = strtotime(str_replace("/", "-",$request->input('end_date')));
        $data['description']    = $request->input('description');
        insurance::where('id',$id)->update($data);
        Session::put('status', 'Cập nhật khách hàng thành công');
        return redirect('dashboard/insurance/all');
    }
    public function delete(Request $request, $id){
        insurance::find($id)->delete();
        Session::put('status', 'Xóa bảo hành khách hàng thành công');
        return back();
    }

    public function search(Request $request){
        $data = insurance::select('insurance.id','name','phone','code','insurance.description','start_date','end_date','product_name')
        ->where('code',$request->input('code'))
        ->join('product','product.id','=','insurance.id_product')
        ->orWhere('phone',$request->input('code'))
        ->orWhere('email',$request->input('code'))
        ->get();
        if(empty($data)){
            echo "Không tìm thấy mã khách hàng";
        }
        else{
            foreach($data as $key => &$value){
               $value['so_ngay'] = ceil(($value['end_date'] - (strtotime(Carbon::now()->format('d-m-Y'))))/84600);
               if($value['so_ngay'] <= 0){
                  $value['so_ngay'] = 0;
              }
              $value['end_date']  = date('d/m/Y', $value['end_date']);
              $value['start_date'] = date('d/m/Y', $value['start_date']);
          }
               // dd($data);
          return view('admin.insurance.search')
          ->with('value',$data);
      }       
  }

  public function updateCustomer($id){
    $customer['status'] = 1;
    DB::table('customer')->where('id',$id)->update($customer);
    Session::put('status', 'Đã cập nhật số điện thoại thành đã gọi');
    return back();
}

public function deleteCustomer(Request $request, $id){
    DB::table('customer')->where('id',$id)->delete();
    Session::put('status', 'Đã xóa số điện thoại');
    return back(); 
}
    public function qrCode($id){
        $qrData = insurance::select('name','code')->where('id',$id)->first();
        $qrCode = base64_encode(QrCode::size(250)->format('png')->generate('https://vitalab.vn/tra-cuu?code='.$qrData['code']));
        return view('admin.insurance.qrcode', compact('qrCode','qrData'));
    }
}
