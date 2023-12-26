<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function addSubscriber(Request $request){
        if($request->ajax()){
            $data = $request->all();
            dd($data);

            echo "<pre>"; print_r($data); die;
        }
    }
}
