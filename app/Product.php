<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'purchase_date',
        'supplier_id',
        'product_quantity',
        'total_amount',
        'amount_paid',
        'amount_due'
    ];

    public function suppliers(){
        return $this->belongsToMany('App\Supplier', 'product_supplier', 'product_id', 'supplier_id');
    }
}
