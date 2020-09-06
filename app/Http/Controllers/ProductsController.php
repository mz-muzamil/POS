<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_data = [];
        $view_data['title'] = "Products - Listing";

        $products = Product::paginate(10);
        $view_data['products'] = $products;

        return view('products/index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_data = [];
        $view_data['title'] = "Products - Add New";

        $suppliers = Supplier::all();

        $view_data['suppliers'] = $suppliers;

        return view('products/add', $view_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation_rules = array();
        $validation_rules['product_name'] = 'required';
        $validation_rules['purchase_date'] = 'required';
        $validation_rules['supplier_id'] = 'required';
        $validation_rules['product_price'] = 'required';
        $validation_rules['product_quantity'] = 'required';
        $validation_rules['total_amount'] = 'required';
        $validation_rules['amount_paid'] = 'required';
        $validation_rules['amount_due'] = 'required';

        $request->validate($validation_rules);


        $product_name = $request->input('product_name');
        $purchase_date = date('Y-m-d H:i:s', strtotime($request->input('purchase_date')));
        $supplier_id = $request->input('supplier_id');
        $product_price = $request->input('product_price');
        $product_quantity = $request->input('product_quantity');
        $total_amount = $request->input('total_amount');
        $amount_paid = $request->input('amount_paid');
        $amount_due = $request->input('amount_due');

        $product = new Product();

        $product->product_name = $product_name;
        $product->purchase_date = $purchase_date;
        $product->supplier_id = $supplier_id;
        $product->product_price = $product_price;
        $product->product_quantity = $product_quantity;
        $product->total_amount = $total_amount;
        $product->amount_paid = $amount_paid;
        $product->amount_due = $amount_due;

        $product->save();

        Session::flash('message', 'Product Successfully Added!');
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view_data = [];
        $view_data['title'] = "Product - Edit";

        $product = Product::find($id);
        $suppliers = Supplier::all();
        $view_data['product'] = $product;
        $view_data['suppliers'] = $suppliers;

        //dd($product);

        return view('products/edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation_rules = array();
        $validation_rules['product_name'] = 'required';
        $validation_rules['purchase_date'] = 'required';
        $validation_rules['supplier_id'] = 'required';
        $validation_rules['product_price'] = 'required';
        $validation_rules['product_quantity'] = 'required';
        $validation_rules['total_amount'] = 'required';
        $validation_rules['amount_paid'] = 'required';
        $validation_rules['amount_due'] = 'required';

        $request->validate($validation_rules);


        $product_name = $request->input('product_name');
        $purchase_date = date('Y-m-d H:i:s', strtotime($request->input('purchase_date')));
        $supplier_id = $request->input('supplier_id');
        $product_price = $request->input('product_price');
        $product_quantity = $request->input('product_quantity');
        $total_amount = $request->input('total_amount');
        $amount_paid = $request->input('amount_paid');
        $amount_due = $request->input('amount_due');

        $product = Product::find($id);
        $product->product_name = $product_name;
        $product->purchase_date = $purchase_date;
        $product->supplier_id = $supplier_id;
        $product->product_price = $product_price;
        $product->product_quantity = $product_quantity;
        $product->total_amount = $total_amount;
        $product->amount_paid = $amount_paid;
        $product->amount_due = $amount_due;

        $product->save();

        Session::flash('message', 'Product Successfully Updated!');
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validation_rules = array();
        $validation_rules['product_id'] = 'required';

        $request->validate($validation_rules);

        $product_id = $request->input('product_id');

        $product = Product::find($product_id);
        $product->delete();

        Session::flash('message', 'Product Successfully deleted!');
        return redirect()->route('products');
    }
}
