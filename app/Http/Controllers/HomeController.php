<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use App\Models\insurance;
use Carbon\Carbon;

class HomeController extends Controller
{

      public function index(){
         $product = Product::limit(5)->get();
         $blog    = Blog::limit(10)->orderby('id','desc')->get();
         return view('home.index')
            ->with('product',$product)
            ->with('blog',$blog);
      }
      public function sanPham(){
         $product = Product::all();
         return view('home.san-pham')
         ->with('product',$product);
    }

      public function tinTuc(){
         $blog =  Blog::paginate(20);
         if(empty($blog)){
            echo "Hiện tại không có bài viết vui lòng thêm bài viết tại đây";
         }
         else{
            return view('home.tin-tuc')
               ->with('blog',$blog);

         }
    }
      public function baoHanh(){
    	return view('home.bao-hanh');
    }
      public function search(Request $request){
         
         $data = insurance::select('name','code','insurance.description','start_date','end_date','product_name')
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
               return view('home.search')
                  ->with('data',$data);
        }
      }
      public function lienHe(){
    	return view('home.lien-he');
    }
}