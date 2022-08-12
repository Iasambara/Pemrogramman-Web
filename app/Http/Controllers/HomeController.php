<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        
      
        $items = TravelPackage::with(['galleries'])->limit(4)-> get(); 
        return view('pages.home',[ 
            'items' => $items 
        ]);
        
        // return view('pages.home',[
        //     'items' => $items
        // ]);
    }
}
