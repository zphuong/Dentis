<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insurance;
use Auth;
use Carbon\Carbon;
use App\Models\Card;

use DB;

class AdminController extends Controller
{
    protected $time_now = null;

    public function __construct() {
        $this->time_now = strtotime(Carbon::now()->format('d-m-Y'));
      }

    public function index(){
        $customer = insurance::whereColumn('end_date','>','start_date')->latest('id')->paginate(10);
        $amount = Card::first();
        $customer_insurance = insurance::where('end_date','>=',$this->time_now)->get()->count();
        $old_customer = insurance::where('end_date','<=',$this->time_now)->get()->count();
        $contact_customer = DB::table('customer')->where('status',0)->get()->count();

        foreach ($customer as $key => &$value) {
            $value['so_ngay'] = ceil(($value['end_date'] - $this->time_now)/84600);
            $value['end_date'] = date('d/m/Y', $value['end_date']);
        }

        $data = $customer;
        $card = $amount;
        $customer = $customer_insurance;
        $old_customer = $old_customer;
        $contact_customer = $contact_customer;
        
        return view('admin.index', compact(
            'data',
            'card',
            'customer',
            'old_customer',
            'contact_customer'
        ));
    }
}
