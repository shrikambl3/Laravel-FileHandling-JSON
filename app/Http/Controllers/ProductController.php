<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = $this->ajax($request);
        return view('form',compact('contents'));
    }

    public function ajax(Request $request)
    {
        $product = Storage::get('storage/app/public/product.txt');
        $contents =json_decode(trim($product));
        if(!empty($request->input('name'))) {
            if(empty($contents)){
                $key = 0;
            } else {
                end($contents);
                $key = key($contents) + 1;
            }
            $contents[$key]['name'] = $request->input('name');
            $contents[$key]['quantity'] = $request->input('quantity');
            $contents[$key]['price'] = $request->input('price')*$request->input('quantity');
            Storage::put('storage/app/public/product.txt', json_encode($contents));
        }
        return view('table',compact('contents'));
    }
}
