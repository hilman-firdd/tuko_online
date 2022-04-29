<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user','sku','name', 'slug', 'price', 'weight', 'length','width','height','short_description','status'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }

    public function statuses() {
        return [
            0 => 'draft',
            1 => 'active',
            2 => 'inactive'
        ];
    }
}
