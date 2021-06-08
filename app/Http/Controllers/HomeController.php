<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\consultation;
use App\Models\closedorder;
use App\Models\dealers;
use App\Models\addresses;
use App\Models\colors;
use App\Models\tickets;
use App\user;
use DB;

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
                        ->orderBy('created_at','desc')
                        ->get();
        //chennai count
        $chennai  = addresses::where('city', 'Chennai')->pluck('id');
        $chn_count = orders::whereIn('address_id', $chennai)
                        ->whereIn('status', [1, 2])
                        ->orderBy('created_at','desc')->count();
        //bangalore count
        $bangalore  = addresses::where('city', 'Bangalore')->pluck('id');
        $bgl_count = orders::whereIn('address_id', $bangalore)
                        ->whereIn('status', [1, 2])
                        ->orderBy('created_at','desc')->count();

        return view('admin.home', compact('orders','chn_count','bgl_count'));
    }

    public function show($id)
    {
      $order  = orders::findOrFail($id);
      $screen = order_lists::where('order_id',$id)
                            ->where('prod_type','!=','ADDON')
                            ->where('prod_type','!=','COUPON')
                            ->first();
      $color  = colors::where('id',$screen->color_id)->first();
      $allcolors = colors::where('model_id',$color->model_id)->get();
      $olist = order_lists::where('order_id',$id)->get();
      $consultation = consultation::where('order_id',$id)->first();
      $smen  =  user::where('user_type','Service Man')->get();
      $dealers  = dealers::all();
      $corder = closedorder::where('order_id',$id)->first();
      $address = addresses::where('customer_id',$order->customer_id)->first();
      $ticket = tickets::where('order_id',$id)->first();
      return view('admin.home', compact('order','olist','screen','consultation','smen','dealers','corder','address','allcolors','color','ticket'));
    }

    public function store(Request $request)
    {
      $location = $request->input('filter');
      $address  = addresses::where('city', $location)->pluck('id');
      $orders = orders::whereIn('address_id', $address)
                      ->whereIn('status', [1, 2])
                      ->orderBy('created_at','desc')->get();
      //chennai count
      $chennai  = addresses::where('city', 'Chennai')->pluck('id');
      $chn_count = orders::whereIn('address_id', $chennai)
                      ->whereIn('status', [1, 2])
                      ->orderBy('created_at','desc')->count();
      //bangalore count
      $bangalore  = addresses::where('city', 'Bangalore')->pluck('id');
      $bgl_count = orders::whereIn('address_id', $bangalore)
                      ->whereIn('status', [1, 2])
                      ->orderBy('created_at','desc')->count();

      return view('admin.home', compact('orders','chn_count','bgl_count'));
    }
}
