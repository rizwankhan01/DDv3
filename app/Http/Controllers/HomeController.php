<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = orders::where('status',1)
                        ->orWhere('status',2)
                        ->get();
        return view('admin.home', compact('orders'));
    }

    public function show($id)
    {
      $order  = orders::findOrFail($id);
      $olist = order_lists::where('order_id',$id)->get();
      return view('admin.home', compact('order','olist'));
    }
}
