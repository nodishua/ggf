<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public function user()
	{
	      return $this->belongsTo('App\User','user_id', 'user_id');
	}

	public function order_detail()
	{
	     return $this->hasMany('App\OrderDetail','order_id', 'order_id');
	}

}
