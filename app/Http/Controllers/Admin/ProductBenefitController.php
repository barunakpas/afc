<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukBenefit;
use Session;

class ProductBenefitController extends Controller
{
    public function index($product_id)
    {
    	$data = ProdukBenefit::where('produk_id', $product_id)->orderBy('no', 'ASC')->get();
    	$product = Produk::select('id', 'name')->find($product_id);

    	return view('admin.product.index-benefit', [
    		'datas' => $data,
    		'product' => $product
    	]);
    }

    public function create(Request $request, $product_id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$request['produk_id'] = $product_id;
    	if($request->hasFile('images')){
	    	$imageName = 'benefit-'.uniqid('', true).'.'.$request->images->extension();
	        $request->images->move(public_path('image/product'), $imageName);
	        $request['image'] = $imageName;
	    }
    	$data = ProdukBenefit::create($request->except(['_token']));
    	Session::flash('alert', ['Insert Success', 'Insert Product Resolve Successfuly', 'success']);
    	return back();
    }

    public function update(Request $request, $id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$data = ProdukBenefit::find($id);
    	$data->update($request->except(['_token']));

    	if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$data['image'])) {
                \File::delete(public_path().'/image/product/'.$data['image']);
            }
            $imageName = 'benefit-'.uniqid('', true).'.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $data->update(['image' => $imageName]);
        }

    	Session::flash('alert', ['Update Success', 'Update Product Paten Successfuly', 'success']);
    	return back();
    }

    public function delete($id)
    {
    	$findData = ProdukBenefit::find($id);
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
