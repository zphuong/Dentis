<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Auth;
use Session;
// session_start();


class CardController extends Controller
{
    public function all(){
        $amount = Card::find(1);
        return view('admin.card.update')->with('user',Auth::user())->with('amount',$amount);
    }

     public function update(Request $request){
        $amount = Card::find(1);
        $amount = $request->amount + $amount->amount;
        $new_amount = Card::find(1);
        $new_amount->amount = $amount;
        $new_amount->save();
        Session::put('status', 'Cập nhật số lượng thẻ thành công!');
        return view('admin.card.update')->with('amount',$new_amount);
    }
}
