<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    	
	public function __construct()
	{
	    $this->middleware('auth:seller');
	}
    //
    public function index(){

        return view('seller.home');
    }

    public function account()
    {
        //Show the account page
        return view('seller.account');
    }
}
