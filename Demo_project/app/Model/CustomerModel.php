<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CustomerModel extends Model
{
    use Notifiable;
    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
}
