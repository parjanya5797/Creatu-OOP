<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd(json_encode(compact('products')));
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store()
    {
        $request = Request()->all();
    //    dd($request);
        $data = $this->validate(Request(),[
            'product_name'=>'required',
            'price'=>'required|integer',
            'quantity'=>'required|integer',
        ]);
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];
        //dd(json_encode(Request()->all()));
        // 

        $products = new Product([
            'product_name'=>$product_name,
            'price'=>$price,
            'quantity'=>$quantity,
        ]);

        $products->save();
        Session::flash("success");
        return redirect('/product');

    }

    public function edit(Product $p,$id)
    {
        $products = $p->encapedit($id);
        return view('product.edit', compact('products'));
    }

    public function update(Product $p, $id)
    {
         $data = request()->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $test = $p->encapupdate($id,$data);
        return redirect('/product');
       // if($products = Product::find($id)) {
       //  $products->product_name = $request->get('product_name');
       //  $products->price = $request->get('price');
       //  $products->quantity = $request->get('quantity');
       //  $products->save();
       //  Session::flash("updatesuccess");
       //  return redirect('/product');
       // } else {
       //     dd('not found');
       // }

    }

    public function delete($id, Product $p)
    {
        $test = $p->encapdelete($id);
        Session::flash('deletesuccess');
        return redirect('/product')->with('success');
    }
    public function insert(Product $p)
    {
        // dd('here');
        $t = request()->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        // dd($t);
        $p->encap($t);
        return redirect('/product');
    }
}
//oop