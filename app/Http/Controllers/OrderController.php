<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\User;
use App\OrderDetail;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$product = Product::where('product_id', $id)->first();

    	return view('app.user.app_dash.order', compact('product'));
    }

    public function Order(Request $request, $id)
    {
    	$product = Product::where('product_id', $id)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_Order > $product->quantity)
    	{
    		return redirect('user/order/'.$id);
    	}

    	//cek validasi
    	$cek_order = Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();
    	//simpan ke database Order
    	if(empty($cek_order))
    	{
    		$order = new Order;
	    	$order->user_id = Auth::user()->user_id;
	    	$order->tanggal = $tanggal;
	    	$order->status = 0;
            $order->jumlah_harga = 0;
            $order->kode = mt_rand(100, 999);
	    	$order->save();
    	}

    	//simpan ke database Order detail
    	$order_baru = Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();

    	//cek Order detail
    	$cek_order_detail = OrderDetail::where('product_id', $product->product_id)->where('order_id', $order_baru->order_id)->first();
    	if(empty($cek_order_detail))
    	{
    		$order_detail = new OrderDetail;
	    	$order_detail->product_id = $product->product_id;
	    	$order_detail->order_id = $order_baru->order_id;
            $order_detail->jumlah = $request->jumlah_order;
            $order_detail->note = $request->note;
            $order_detail->jumlah_harga = $product->harga*$request->jumlah_order;
            if($request->jumlah_order <= 0){
                alert()->error('Jangan Ngadi-Ngadi Lu Bray', 'Error');
                return back();
            }
            if($request->jumlah_order > $product->stock){
                alert()->error('Jangan Ngadi-Ngadi Lu Bray', 'Error');
                return back();
            }
            $order_detail->save();
    	}else
    	{
    		$order_detail = OrderDetail::where('product_id', $product->product_id)->where('Order_id', $order_baru->order_id)->first();
    		$order_detail->jumlah = $order_detail->jumlah+$request->jumlah_order;

    		//harga sekarang
            $harga_order_detail_baru = $product->harga*$request->jumlah_order;
	    	$order_detail->jumlah_harga = $order_detail->jumlah_harga+$harga_order_detail_baru;
	    	$order_detail->update();
    	}

    	//jumlah total
    	$order = Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();
    	$order->jumlah_harga = $order->jumlah_harga+$product->harga*$request->jumlah_order;
    	$order->update();

        alert()->success('Order Sukses Masuk Keranjang', 'Success');
    	return redirect('user/check_out');

    }

    public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();
        if(!empty($order))
        {
            $order_details = OrderDetail::where('order_id', $order->order_id)->get();
        }
        else{
            $order_details = OrderDetail::all();
        }
        return view('app.user.app_dash.order_check_out', compact('order', 'order_details'));
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::where('order_id', $id)->first();

        $order = Order::where('order_id', $order_detail->order_id)->first();
        $order->jumlah_harga = $order->jumlah_harga-$order_detail->jumlah_harga;
        $order->update();

        $order_detail->delete();

        alert()->error('Order Sukses Dihapus', 'Hapus');
        return redirect('user/check_out');
    }

    public function konfirmasi()
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();

        if(empty($user->address))
        {
            alert()->error('Identitasi Harap dilengkapi', 'Error');
            return redirect('user/profile');
        }

        if(empty($user->phone_number))
        {
            alert()->error('Identitasi Harap dilengkapi', 'Error');
            return redirect('user/profile');
        }

        $order = Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();
        $order_id = $order->order_id;
        $order->status = 1;
        $order->update();

        $order_details = OrderDetail::where('order_id', $order_id)->get();
        foreach ($order_details as $order_detail) {
            $product = Product::where('product_id', $order_detail->product_id)->first();
            $product->quantity = $product->quantity-$order_detail->jumlah;
            $product->update();
        }



        alert()->success('Order Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('user/history/'.$order_id);

    }


}
