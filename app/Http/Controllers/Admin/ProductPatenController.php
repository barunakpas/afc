<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukPaten;

use Session;

class ProductPatenController extends Controller
{
    public function index($product_id)
    {
    	$data = ProdukPaten::where('produk_id', $product_id)->orderBy('id', 'DESC')->get();
    	$product = Produk::select('id', 'name')->find($product_id);

    	return view('admin.product.index-paten', [
    		'datas' => $data,
    		'product' => $product
    	]);
    }

    public function create(Request $request, $product_id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$request['produk_id'] = $product_id;
    	if($request->hasFile('images')){
	    	$imageName = 'paten-'.uniqid('', true).'.'.$request->images->extension();
	        $request->images->move(public_path('image/product'), $imageName);
	        $request['image'] = $imageName;
	    }
    	$data = ProdukPaten::create($request->except(['_token']));
    	Session::flash('alert', ['Insert Success', 'Insert Product Resolve Successfuly', 'success']);
    	return back();
    }

    public function update(Request $request, $id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$data = ProdukPaten::find($id);
    	$data->update($request->except(['_token']));

    	if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$data['image'])) {
                \File::delete(public_path().'/image/product/'.$data['image']);
            }
            $imageName = 'paten-'.uniqid('', true).'.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $data->update(['image' => $imageName]);
        }

    	Session::flash('alert', ['Update Success', 'Update Product Paten Successfuly', 'success']);
    	return back();
    }

    public function delete($id)
    {
    	$findData = ProdukPaten::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }
        if (file_exists(public_path().'/image/product/'.$findData['image'])) {
            \File::delete(public_path().'/image/product/'.$findData['image']);
        }
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete Product Paten successfuly'
        ];
    }
}
