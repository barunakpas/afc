<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukResolve;

use Session;

class ProductResolveController extends Controller
{
    public function index($product_id)
    {
    	$data = ProdukResolve::where('produk_id', $product_id)->orderBy('no', 'ASC')->get();
    	$product = Produk::select('id', 'name')->find($product_id);

    	return view('admin.product.index-resolve', [
    		'datas' => $data,
    		'product' => $product
    	]);
    }

    public function create(Request $request, $product_id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$request['produk_id'] = $product_id;
    	$data = ProdukResolve::create($request->except(['_token']));
    	Session::flash('alert', ['Insert Success', 'Insert Product Resolve Successfuly', 'success']);
    	return back();
    }

    public function update(Request $request, $id)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$data = ProdukResolve::find($id);
    	$data->update($request->except(['_token']));
    	Session::flash('alert', ['Update Success', 'Update Product Resolve Successfuly', 'success']);
    	return back();
    }

    public function delete($id)
    {
    	$findData = ProdukResolve::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }
        
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete Product Resolve successfuly'
        ];
    }
}
