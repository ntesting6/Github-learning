<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    //
	public function shop_page(){
		
		return view('shop.shop');
	}
}
