<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function homeUser(){
        return view('user.homeUserver');
    }

    public function katalog(){
        $products = DB::table('products')->get();
        return view('user.product',['products' => $products]);
    }

    public function homeAdmin(){

    }
}
