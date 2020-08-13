<?php

namespace App\Http\Controllers;
use Auth;
Use Hash;
Use App\Admin;
Use App\Event;
Use App\Product;
Use App\User;
Use Image;
Use Storage;
use App\Order;
use App\OrderDetail;
use Alert;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_orders = DB::table('order_details')
        ->join('orders','order_details.order_id','=','orders.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->where('status','=','1')
        ->count();

        $on_ship = DB::table('order_details')
        ->join('orders','order_details.order_id','=','orders.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->where('status','=','3')
        ->count();
        return view('app.layouts.adminlayouts.dashboard',compact('new_orders','on_ship'));
    }

    //Proses Admin
    public function data_admin(){
        $data_admin = \App\Admin::paginate(10);
        return view('app.admin.app_dash.data_admin',['data_admin'=> $data_admin]);
    }
    public function tambah_data_admin(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
        ]);
        $data_admin = new Admin;
        $data_admin->name =$request->name;
        $data_admin->email =$request->email;
        $data_admin->password = bcrypt($request->password);
        $data_admin->save();
        alert()->success('Add Admin Success', 'Success');
        return redirect('/admin/data_admin')->with('sukses','Data Berhasil Ditambahkan');

    }
    public function delete_admin(Request $request,$id){
        $data_admin = \App\Admin::find($id);
        $data_admin->delete($data_admin);
        alert()->error('Delete Admin Success', 'Success');
        return redirect('/admin/data_admin');
    }
    //Proses User
    public function data_user(){
        $data_user = \App\User::paginate(10);
        return view('app.admin.app_dash.data_user',['data_user'=> $data_user]);
    }
    public function user_profile($id){
        $user = \App\User::find($id);
        return view('app.admin.app_dash.user_profile',['user'=> $user]);
    }


    public function delete_user(Request $request,$id){
        $data_user = \App\User::find($id);
        $data_user->delete($data_user);
        alert()->error('Delete User Success', 'Success');
        return redirect('/admin/data_user');
    }

    // Proses Produk
    public function product(){
        $data_product = \App\Product::all();
        return view('app.admin.app_dash.product',['data_product'=> $data_product]);
    }

    public function tambah_data_product(Request $request){
        $this->validate($request, [
            'name_product' => 'required',
            'details' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'quantity' => 'required',
            'image' => 'sometimes|image',
        ]);
        $data_product = new Product;
        $data_product->name_product =$request->name_product;
        $data_product->details =$request->details;
        $data_product->description =$request->description;
        $data_product->harga =$request->harga;
        $data_product->quantity =$request->quantity;
        if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time(). '.'. $image->getClientOriginalExtension();
        $location = public_path('/images/products/' . $filename);
        Image::make($image)->resize(800,400)->save($location);
        $data_product->image =$filename;
        }
        $data_product->save();
        alert()->success('Add Success', 'Success');
        return redirect('/admin/product')->with('sukses','Data Berhasil Ditambahkan');

    }

    public function product_show($id){
        $product = \App\Product::find($id);
        return view('app.admin.app_dash.product_show',['product'=> $product]);
    }

    public function product_update(Request $request, $id){
        $this->validate($request, [
            'name_product' => 'required',
            'details' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'quantity' => 'required',
            'image' => 'sometimes|image',
        ]);
        $product = \App\Product::find($id);
        $product->name_product = $request->input('name_product');
        $product->details = $request->input('details');
        $product->description = $request->input('description');
        $product->harga = $request->input('harga');
        $product->quantity = $request->input('quantity');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.'. $image->getClientOriginalExtension();
            $location = public_path('/images/products/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $product->image;
            $product->image =$filename;

            Storage::delete($oldFilename);

            }

        $product->save();
        alert()->success('Update Success', 'Success');
        return redirect()->route('admin.product_update',$product);

    }

    public function delete_product($id){
        $data_product = \App\Product::find($id);
        $data_product->delete($data_product);
        Storage::delete($data_product->image);
        alert()->error('Delete Product Success', 'Success');
        return back();
    }

    // Proses Event
    public function event(){
        $data_event = \App\Event::paginate(10);
        return view('app.admin.app_dash.event',['data_event'=> $data_event]);
    }

    public function tambah_data_event(Request $request){
        $this->validate($request, [
            'name_event' => 'required',
            'description' => 'required',
            'poster' => 'sometimes|image',
        ]);
        $data_event = new Event;
        $data_event->name_event =$request->name_event;
        $data_event->description =$request->description;
        if($request->hasFile('poster')){
        $poster = $request->file('poster');
        $filename = time(). '.'. $poster->getClientOriginalExtension();
        $location = public_path('/images/poster/' . $filename);
        Image::make($poster)->resize(800,400)->save($location);
        $data_event->poster =$filename;
        }
        $data_event->save();
        return redirect('/admin/event')->with('sukses','Data Berhasil Ditambahkan');

    }

    public function event_show($id){
        $event = \App\Event::find($id);
        return view('app.admin.app_dash.event_show',['event'=> $event]);
    }

    public function event_update(Request $request, $id){
        $this->validate($request, [
            'name_event' => 'required',
            'description' => 'required',
            'poster' => 'sometimes|image',
        ]);
        $event = \App\Event::find($id);
        $event->name_event = $request->input('name_event');
        $event->description = $request->input('description');
        if($request->hasFile('poster')){
            $poster = $request->file('poster');
            $filename = time(). '.'. $poster->getClientOriginalExtension();
            $location = public_path('/images/poster/' . $filename);
            Image::make($poster)->resize(800,400)->save($location);
            $oldFilename = $event->poster;
            $event->poster =$filename;

            Storage::delete($oldFilename);

            }

        $event->save();
        return redirect()->route('admin.event_update',$event)->with('sukses','Data Berhasil Diupdate');

    }

    public function delete_event(Request $request,$id){
        $data_event = \App\Event::find($id);
        $data_event->delete($data_event);
        Storage::delete($data_event->poster);
        alert()->error('Delete Event Success', 'Success');
        return redirect('/admin/event');
    }

    public function data_order(){
        $data_order = Order::all();
        return view('app.admin.app_dash.data_order',compact('data_order'));
    }

    public function detail_order($id){
        $data_order = DB::table('order_details')
        ->join('orders','orders.order_id','=','order_details.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->join('products','products.product_id','=','order_details.product_id')
        ->where('orders.order_id','=',$id)
        ->get();
        foreach($data_order as $order){

        }
        return view('app.admin.app_dash.detail_order',compact('data_order','order'));

    }

    public function new_order(){
        $data_order = DB::table('order_details')
        ->join('orders','orders.order_id','=','order_details.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->orderBy('tanggal','ASC')
        ->where('status','=','1')
        ->paginate(10);
        return view('app.admin.app_dash.data_order',compact('data_order'));
    }

    public function in_ship(){
        $data_order = DB::table('order_details')
        ->join('orders','orders.order_id','=','order_details.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->orderBy('tanggal','ASC')
        ->where('status','=','3')
        ->paginate(10);
        return view('app.admin.app_dash.status_order',compact('data_order'));
    }
    public function status_order(){
        $data_order = DB::table('order_details')
        ->join('orders','orders.order_id','=','order_details.order_id')
        ->join('users','orders.user_id','=','users.user_id')
        ->orderBy('tanggal','ASC')
        ->where('status','=','1')
        ->orWhere('status','=','2')
        ->orWhere('status','=','3')
        ->paginate(10);
        return view('app.admin.app_dash.status_order',compact('data_order'));
    }

    public function order_delete($id){
        $data_order = \App\Order::find($id);
        $data_order->delete($data_order);
        alert()->error('Delete Order Success', 'Success');
        return back();
    }

    public function status_update(Request $request,$id){
        $data = array("status"=>$request->status);
        $data_order = Order::find($id);
        Order::where('order_id',$id)->update($data);
        alert()->success('Status Update Success', 'Success');
        return back();
    }

}
