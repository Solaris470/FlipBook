<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index($id=''){
        $val = $id;
        $data = 1;
        // dd($data,$id);
        return view('front.index',compact('data','val'));
    }
    public function ebook($id){
        $val = $id;
        return view('front.ebook',compact('val'));
    }
    public function test() {
        return view('front.test');
    }
}
