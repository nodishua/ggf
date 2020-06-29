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
use Illuminate\Http\Request;
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $event = \App\Event::paginate(1);
        $product = \App\Product::paginate(3);
        return view('app.layouts.userlayouts.dashboard',compact('product','event'));

    }
    public function product()
    {
        $product = \App\Product::paginate(9);
        return view('app.user.app_dash.product',compact('product'));
    }
    public function product_show($id){
        $product = \App\Product::find($id);
        return view('app.user.app_dash.product_show',['product'=> $product]);
    }
    public function event()
    {
        $event = \App\Event::all();
        return view('app.user.app_dash.event',compact('event'));
    }
    public function event_show($id){
        $event = \App\Event::find($id);
        return view('app.user.app_dash.event_show',['event'=> $event]);
    }

    public function how_to_order(){
        return view('app.user.app_dash.how_to_order');
    }
    public function custom(){
        return view('app.user.app_dash.custom');
    }

    public function spray1(){
        return view('app.user.app_dash.300ml');
    }

    public function spray2(){
        return view('app.user.app_dash.400ml');
    }
}
