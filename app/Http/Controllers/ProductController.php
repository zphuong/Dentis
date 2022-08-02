<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use Illuminate\Support\Str;
use Session;
use DB;
use Mail;
use URL;
use App\Mail\AdviseMail;
session_start();

class ProductController extends Controller
{
    public function add(Request $request){
        $result = Product::paginate(10);
        return view('admin.product.add')
        ->with('result',$result);
    }

    public function postAdd(Request $request){
        $data = new Product();
        $data['product_name'] = $request->get('name');
        $get_img = $request->image;
        if ($get_img) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move( './upload/product', $name_img);
        }
        else{
            Session::put('status', 'Cần upload hình ảnh cho sản phẩm');
            return back();
        }
        $data['description'] = $request->get('description');
        $data->save();
        Session::put('status', 'Thêm sản phẩm thành công');
        return redirect('dashboard/product/add');
    }

    public function all(){
        $result = Product::paginate(20);
        return view('admin.product.all')->with('result',$result);
    }

    public function edit($id){
        $data = Product::find($id);
        return view('admin.product.edit')->with('data',$data)->with('user',Auth::user());
    }

    public function update(Request $request, $id){
        $data = array();
        $data['product_name'] = $request->get('name');
        $get_img = $request->image;
        if ($get_img) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move( './upload/product', $name_img);
            @unlink('./upload/product/'.Product::find($id)->image);
        }
        else{
            $data['image'] = Product::find($id)->image;
        }
        $data['description'] = $request->get('description');
        Product::where('id', $id)->update($data);
        Session::put('status', 'Cập nhật phẩm thành công');
        return redirect('dashboard/product/all');
    }

    public function delete($id){
        unlink('./upload/product/'.Product::find($id)->image);
        Product::find($id)->delete();
        Session::put('status', 'Xóa sản phẩm thành công');
        return redirect('dashboard/product/all');
    }

    public function productDetail($slug){
        $productDetails = product::where('slug',$slug)->first();
        $productRelate  = product::limit(3)->get();

        $seo = new \stdClass();
        $seo->title        =   $productDetails->product_name;
        $seo->url           =   URL::current();
        $seo->image         =   'product/'.$productDetails->image;
         return view('home.chi-tiet-san-pham')
            ->with('product', $productDetails)
            ->with('productRelate', $productRelate)
            ->with('seo', $seo);
    }
    public function advise(Request $request ){
        $customer = array();
        $customer['phone'] = $request->input('phone');
        $customer['status'] = 0;
        DB::table('customer')->insert($customer);

        $mail_data = new \stdClass();
        $mail_data->phone = $request->input('phone');
        Mail::to('phuongtha27@gmail.com')->send(new AdviseMail($mail_data));
        // nguyenvanhieulabo@gmail.com
        Session::put('status', 'Đã gửi yêu cầu tư vấn thành công, chúng tôi sẽ sớm liên hệ');
        return back();
    }
}