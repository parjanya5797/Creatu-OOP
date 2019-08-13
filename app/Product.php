<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $guarded=[];

    protected $table = "products";
    protected $fillable = [
    	'product_name',
    	'price',
    	'quantity',
    ];
    public function encap($t)
    {
    	return Product::create($t);
    }
    public function encapedit($t)
    {
    	return Product::where('id',$t)->get()->first();
    }
     public function encapupdate($t,$data)
    {
    	return Product::where('id',$t)->update($data);
    }
     public function encapdelete($t)
    {
    	return Product::where('id',$t)->delete($t);
    }
}
