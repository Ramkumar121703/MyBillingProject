<?php

namespace App\Http\Controllers;
use App\Models\Grahak;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

$currentTime = Carbon::now();

use Illuminate\Http\Request;

class ProductController extends Controller
{

 public function index()
{

    $grahak = Grahak::with('products')->get();
 $totalCustomers = Grahak::count();

 $totalProducts = Product::count();
return view('welcome', compact('grahak', 'totalCustomers', 'totalProducts'));


}

public function products()
{
    $grahaks = Grahak::with('products')->get();

    return view('all_products', compact('grahaks'));
}


public function edit($id)
{
    $product = Product::findOrFail($id);
    $grahaks = Grahak::all();

    return view('edit_product', compact('product', 'grahaks'));
}
public function delete(Request $request,$id){
   $product = Product::find($id);
   $product->delete();
   return redirect()->back();
}
public function deletecustomer(Request $request,$id){
   $grahak = Grahak::find($id);
   $grahak->delete();
   return redirect()->back();
}

public function add_product()
{
    $grahaks = Grahak::all();

    return view('add_product', compact('grahaks'));
}






public function store(Request $request){
        $request->validate([
            'product_name'=>'required',
            'product_brand'=>'nullable',
            'product_imei'=>'nullable',
            'product_hsn'=>'nullable',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'product_gst'=>'nullable',
            'product_discount'=> 'nullable',
             'grahak_id' => 'required|exists:grahaks,id'



            ]);



       $p = new Product();
        $p->product_name = $request->input('product_name');
        $p->product_brand = $request->input('product_brand');
        $p->product_imei = $request->input('product_imei');
        $p->product_hsn = $request->input('product_hsn');
        $p->product_price = $request->input('product_price');
        $p->product_quantity = $request->input('product_quantity');
        $p->product_gst = $request->input('product_gst');
        $p->product_discount = $request->input('product_discount');
        $p->grahak_id = $request->input('grahak_id');
        $p->save();
        if($p){
            return redirect()->route('products')->with('success','product added successfully');
        }

}







public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required',
        'product_brand' => 'nullable',
        'product_imei' => 'nullable',
        'product_hsn' => 'nullable',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|integer',
        'product_gst' => 'nullable|numeric',
        'product_discount' => 'nullable|numeric',
        'grahak_id' => 'required|exists:grahaks,id',
    ]);

    $product = Product::findOrFail($id);

    $product->product_name = $request->product_name;
    $product->product_brand = $request->product_brand;
    $product->product_imei = $request->product_imei;
    $product->product_hsn = $request->product_hsn;
    $product->product_price = $request->product_price;
    $product->product_quantity = $request->product_quantity;
    $product->product_gst = $request->product_gst;
    $product->product_discount = $request->product_discount;
    $product->grahak_id = $request->grahak_id;

    $product->save();

    return redirect()->route('products')
        ->with('success', 'Product updated successfully');
}




public function all_customers(){

    $grahaks = Grahak::with('products')->get();
    return view('allcustomer',compact('grahaks'));
}

public function add_customer(){
    return view('addcustomer');
}

public function addcustomer(Request $request){
    $request->validate([
        'name'=>'required',
        'phone'=>'required|unique:grahaks|min:10,max:12',
        'address'=>'required',
    ]);

    $customer = new Grahak();
    $customer->name = $request->name;
    $customer->phone = $request->phone;
    $customer->address = $request->address;
    $customer->save();
    if($customer){
        return redirect()->route('all_customers')->with('success','Customer added successfully...');
    }
}
public function invoice($id)

{
    date_default_timezone_set('Asia/Kolkata');
    $grahak = Grahak::with('products')->findOrFail($id);

    return view('invoice', compact('grahak'));
}


public function register(){
    return view('register');
}
public function login(){
    return view('login');
}

public function registersave(Request $request){
$request->validate([
    'name'=>'required',
    'email'=>'required|email',
    'password'=>'required|confirmed'
]);
$registers = new User();
$registers->name =$request->input('name');
$registers->email =$request->input('email');
$registers->password =$request->input('password');
$registers->save();
return redirect()->route('login')->with('success','register successfully...');
}

public function loginmatch(Request $request){
   $request->validate([
    'email'=>'required|email',
    'password'=>'required',
   ]);




$user = User::where('email', $request->email)->first();


if ($user && Hash::check($request->password, $user->password)) {

    Auth::login($user);
    return redirect()->route('all_customers')->with('success','login successfully...');
} else {

    return back()->withErrors(['msg' => 'Invalid credentials']);
}






}



public function logout(){
    Auth::logout();
    return redirect()->back();
}






}
