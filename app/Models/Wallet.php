<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'name', 'type', 'balance'];

    function user() {
        return $this->belongsTo(User::class);
    }
}
