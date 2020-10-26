<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['fullname', 'phone', 'email', 'image'];
}
