<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Product extends Authenticatable
{
    use Notifiable;

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public function order_detail()
	{
	     return $this->hasMany('App\OrderDetail','product_id', 'id');
	}
    protected $fillable = [
        'name_product','details','description','harga','quantity','image'
    ];

}
