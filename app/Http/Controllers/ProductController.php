<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(){
        $data = DB::table("products")->get();
        return view('product.index',['products'=>$data]);

    } 

    public function delete($id){
        $delete=DB::table("products")
        ->where("id", "=", $id)
        ->delete();

        return redirect("/products")->with("success", "PRODUCT DELETED SUCCESSFULLY");

    }

    public function addProduct(){
        return view('product.add');

    }

    public function saveProduct(Request $req){
        // dd($req);
        $validated=$req->validate([
            "description"=>['required','min:3'],
            "quantity"=>['required','min:1'],
            "price"=>['required','min:1'],

        ]);

            $data=product::create($validated);
            return redirect("/products")->with('success', 'PRODUCT ADDED SUCCESSFULLY');

    }

    public function edit($id){
        $data=product::findOrFail($id);
        return view('product.edit',['product'=>$data]);

    }

    public function updateProduct(Request $req){
        $req->validate([
            "description"=>['required','min:3'],
            "quantity"=>['required','min:1'],
            "price"=>['required','min:1']

        ]);

        $data=product::find($req->id);
        $data->description=$req->description;
        $data->quantity=$req->quantity;
        $data->price=$req->price;
        $data->save();

        return redirect("/products")->with('success', 'PRODUCT EDITED SUCCESSFULLY');


    }

}
