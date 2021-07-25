<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'phone' ,
        'email' ,
        'patrol' ,
        'days' ,
        'lock_up' ,
        'contact_length' ,
        'site_name' ,
        'call_out' => 'required',

        'invoice_period' ,
        'payment' ,
        'payment_term' => 'required',
    ];
}
