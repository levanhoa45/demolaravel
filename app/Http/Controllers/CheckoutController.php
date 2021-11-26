<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('carts.login_checkout',[
            'title' => 'Login Checkout'
        ]);
    }
    public function register()
    {
        return view('carts.register_checkout',[
            'title' => 'Register Checkout'
        ]);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_birthday'] = $request->customer_birthday;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;

        $customer_id = DB::table('customers')->insertGetId($data);

        // Session::put('customer_id', $customer_id);
        // Session::put('customer_id', $request->customer_name);

        // return Redirect::to('/carts_checkout');   
        return Redirect::to('/login-checkout'); 
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
        
    }

    public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = $request->password_account;
    	$result = DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
    	
    	
    	if($result){
    		Session::put('customer_id',$result->id);
    		return Redirect::to('/carts_checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}
    }
}
