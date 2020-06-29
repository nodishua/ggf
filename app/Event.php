<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Event extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'events';
    protected $primaryKey = 'event_id';

    protected $fillable = [
        'name_event', 'description', 'poster',
    ];
}
