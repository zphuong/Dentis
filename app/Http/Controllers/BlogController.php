<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Support\Str;
use Session;

class BlogController extends Controller
{
    public function all(){
        $data = Blog::paginate(20);
        return view('admin.blog.all', compact('data'))->with('user',Auth::user());
    }

    public function add(){
        $result = Blog::paginate(10);
        return view('admin.blog.add', compact('result'))->with('user',Auth::user());
    }

    public function create(Request $request){
        $data = new Blog();
        $data['title'] = $request->name;
        $get_img = $request->image;
        if ($get_img) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move( './upload/blog', $name_img);
        }
        else{
            Session::put('status', 'Cần upload hình ảnh cho bài viết');
            return back();
        }
        $data['description'] = $request->get('description');
        $data->save();
        Session::put('status', 'Thêm bài viết thành công');
        return redirect('dashboard/blog/add');
    }

    public function edit($id){
        $data = Blog::find($id);
        return view('admin.blog.edit')->with('data',$data);
    }

    public function update(Request $request, $id){
        $data = [];
        $data['title'] = $request->get('name');

        $get_img = $request->image;

        if ($request->has('image')) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move(public_path('upload/blog') , $name_img);
            @unlink('./upload/blog/'.Blog::find($id)->image);
        }
        else{
            $data['image'] = Blog::find($id)->image;
        }
        $data['description'] = $request->get('description');
        Blog::where('id', $id)->update($data);
        Session::put('status', 'Cập nhật thành công');
        return redirect('dashboard/blog');
    }

    public function delete($id){
        @unlink('./upload/blog/'.Blog::find($id)->image);
        Blog::find($id)->delete();
        Session::put('status', 'Xóa bài viết thành công');
        return redirect()->to('dashboard/blog');
    }
    public function blogDetail($slug){
        $product    = Product::limit(5)->get();
        $blogDetail = Blog::where('slug',$slug)->first();
        $blog       = Blog::limit(6)->get();

        $seo = new \stdClass();
        $seo->title         =   $blogDetail->title;
        $seo->url           =   \URL::current();
        $seo->image         =   'blog/'.$blogDetail->image;

        return view('home.chi-tiet-bai-viet')
            ->with('blogDetail', $blogDetail)
            ->with('product',$product)
            ->with('blog',$blog)
            ->with('seo',$seo);
    }
}
