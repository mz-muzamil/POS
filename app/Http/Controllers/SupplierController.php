<?php

namespace App\Http\Controllers;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $view_data = [];
        $view_data['title'] = "Suppliers - Listing";

        $suppliers = Supplier::paginate(10);
        $view_data['suppliers'] = $suppliers;

        return view('suppliers/index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_data = [];
        $view_data['title'] = "Supplier - Add New";

        return view('suppliers/add', $view_data);
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
        $validation_rules['name_company'] = 'required';
        $validation_rules['contact_person'] = 'required';
        $validation_rules['email'] = 'required';
        $validation_rules['phone_number'] = 'required';
        $validation_rules['supplier_id'] = 'required';
        $validation_rules['city'] = 'required';
        $validation_rules['state'] = 'required';
        $validation_rules['address'] = 'required';

        $request->validate($validation_rules);

        $company_name = $request->input('name_company');
        $contact_person = $request->input('contact_person');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $phone_whatsApp = $request->input('phone_whatsApp');
        $status = $request->input('status');
        $supplier_id = $request->input('supplier_id');
        $country = $request->input('country');
        $city = $request->input('city');
        $state = $request->input('state');
        $postal_code = $request->input('postal_code');
        $address = $request->input('address');

        $suppliers = new Supplier();
        $suppliers->name = $company_name;
        $suppliers->contact_person = $contact_person;
        $suppliers->email = $email;
        $suppliers->phone_number = $phone_number;
        $suppliers->phone_whatsApp = $phone_whatsApp;
        $suppliers->status = $status;
        $suppliers->supplier_id = $supplier_id;
        $suppliers->country = $country;
        $suppliers->city = $city;
        $suppliers->state = $state;
        $suppliers->postal_code = $postal_code;
        $suppliers->address = $address;

        $suppliers->save();

        Session::flash('message', 'Supplier Successfully Added!');
        return redirect()->route('suppliers');


        
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
        $view_data['title'] = "Supplier - Edit";

        $supplier = Supplier::find($id);
        $view_data['supplier'] = $supplier;

        //dd($suppliers);

        return view('suppliers/edit', $view_data);
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
        $validation_rules['name_company'] = 'required';
        $validation_rules['contact_person'] = 'required';
        $validation_rules['email'] = 'required';
        $validation_rules['phone_number'] = 'required';
        $validation_rules['supplier_id'] = 'required';
        $validation_rules['city'] = 'required';
        $validation_rules['state'] = 'required';
        $validation_rules['address'] = 'required';

        $request->validate($validation_rules);


        $company_name = $request->input('name_company');
        $contact_person = $request->input('contact_person');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $phone_whatsApp = $request->input('phone_whatsApp');
        $status = $request->input('status');
        $supplier_id = $request->input('supplier_id');
        $country = $request->input('country');
        $city = $request->input('city');
        $state = $request->input('state');
        $postal_code = $request->input('postal_code');
        $address = $request->input('address');

        $supplier = Supplier::find($id);
        $supplier->name = $company_name;
        $supplier->contact_person = $contact_person;
        $supplier->email = $email;
        $supplier->phone_number = $phone_number;
        $supplier->phone_whatsApp = $phone_whatsApp;
        $supplier->status = $status;
        $supplier->supplier_id = $supplier_id;
        $supplier->country = $country;
        $supplier->city = $city;
        $supplier->state = $state;
        $supplier->postal_code = $postal_code;
        $supplier->address = $address;

        $supplier->save();

        Session::flash('message', 'Supplier Successfully Updated!');
        return redirect()->route('suppliers');
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
        $validation_rules['supplier_id'] = 'required';

        $request->validate($validation_rules);

        $supplier_id = $request->input('supplier_id');

        $supplier = Supplier::find($supplier_id);
        $supplier->delete();

        Session::flash('message', 'Supplier Successfully deleted!');
        return redirect()->route('suppliers');
    }
}
