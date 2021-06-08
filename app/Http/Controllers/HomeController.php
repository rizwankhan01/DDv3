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
                        ->paginate(10);
        return view('admin.home', compact('orders'));
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
                      ->where('status',1)
                      ->orWhere('status',2)
                      ->orderBy('created_at','desc')->paginate(10);

      #select * from `orders` where `address_id` in (select * from `addresses` where `city` = Bangalore)
      //$orders = DB::select("select * from `orders` where `address_id` in (select `id` from `addresses` where `city` = '".$location."')");
      /*$orders = DB::table('orders')
                ->selectRaw('*')
                ->where('address_id', "(select `id` from `addresses` where `city` = '".$location."')")
                ->get();
      //dd($orders);
      /*$orders = DB::table('orders')
                ->selectRaw('SELECT *')
                ->whereRaw("address_id in (select id from addresses where city='".$location."')")
                ->paginate(10);
      //$orders = orders::whereIn('address_id', addresses::where('city','Bangalore'))->get();
      //dd($request->input('filter'));
      /*
      $orders = orders::with(['city' => function($query) use ($location) {
          $query->where('address_id', '=', $location);
        }])->get();
      $orders = orders::where('status',1)
                      ->orWhere('status',2)
                      ->orderBy('created_at','desc')
                      ->paginate(10);
                      */
      return view('admin.home', compact('orders'));
    }
}
