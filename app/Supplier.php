<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone_whatsApp',
        'status',
        'supplier_id',
        'country',
        'state',
        'postal_code',
        'address'
    ];

    public function products(){
        return $this->belongsToMany('App\Product', 'product_supplier', 'supplier_id', 'product_id');
    }
}
