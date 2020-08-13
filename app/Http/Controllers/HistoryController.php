<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\User;
use App\OrderDetail;
use Auth;
use Alert;
use PDF;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = Order::where('user_id', Auth::user()->user_id)->where('status', '!=',0)->where('jumlah_harga','!=','kode')->get();

    	return view('app.user.app_dash.history_index', compact('orders'));
    }

    public function detail($id)
    {
    	$order = Order::where('order_id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->order_id)->get();
     	return view('app.user.app_dash.history_detail', compact('order','order_details'));
    }

}
