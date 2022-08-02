<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use Str;


class PageController extends Controller
{
    public function all(){
        $page = Page::all();
        return view('admin.page.all')
        ->with('data',$page);
    }
    public function add(){
        return view('admin.page.add');
    }
    public function postAdd(Request $request){
        $data = new Page();
        $data['title'] = $request->name;
        $get_img = $request->image;
        if ($get_img) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move( './upload/page', $name_img);
        }
        else{
            Session::put('status', 'Cần upload hình ảnh cho trang');
            return back();
        }
        $data['description'] = $request->get('description');
        $data->save();
        Session::put('status', 'Đã thêm trang');
        return redirect('dashboard/page/add');
    }

    public function edit($id){
        $data = Page::find($id);
        return view('admin.page.edit')->with('data',$data);
    }

    public function postEdit(Request $request, $id){
        $data = [];
        $data['title'] = $request->get('name');

        $get_img = $request->image;

        if ($request->has('image')) {
            $name_img = Str::random(2).'_'.$get_img->getClientOriginalName();
            $data['image'] = $name_img;
            $get_img->move(public_path('upload/page') , $name_img);
            @unlink('./upload/page/'.Page::find($id)->image);
        }
        else{
            $data['image'] = Page::find($id)->image;
        }
        $data['description'] = $request->get('description');
        Page::where('id', $id)->update($data);
        Session::put('status', 'Cập nhật thành công');
        return redirect('dashboard/page');
    }

    public function delete($id){
        @unlink('./upload/page/'.Page::find($id)->image);
        Page::find($id)->delete();
        Session::put('status', 'Xóa trang thành công');
        return redirect()->to('dashboard/page');
    }

    public function getPage($slug){
        $page_detail = Page::where('slug',$slug)->first();
        if (empty($page_detail)) {
            return abort(404);
        }
        else{
            return view('home.page')->with('page_detail',$page_detail);
        }
    }
}
