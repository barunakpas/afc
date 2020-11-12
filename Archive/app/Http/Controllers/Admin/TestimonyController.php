<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Session;

class TestimonyController extends Controller
{
    public function index()
    {
    	$data = DB::table('testimonies')
    	->leftJoin('produks', 'testimonies.product_id', '=', 'produks.id')
    	->select('testimonies.*', 'produks.name')->orderBy('name', 'ASC')->get();
        $product = Produk::orderBy('name', 'ASC')->get();
    	return view('admin.testimony', [
    		'datas' => $data,
    		'products' => $product
    	]);
    }

    public function store(Request $request)
    {
    	$request['active'] = ($request->has('active') ? true : false);
        if($request->hasFile('images')){
            $imgName = 'testimony-'.uniqid('', true).'.'.$request->images->extension();
            $datatest = $request->images->move(public_path('image/testimony'), $imgName);
            $request['image'] = $imgName;
        }

        $data = Testimony::create($request->except( ['images', '_token'] ));
        if($data){
        	Session::flash('alert', ['Insert Success', 'Insert Testimony Successfuly', 'success']);
        	return back();
        }else{
			Session::flash('alert', ['Insert Error', 'Insert Testimony Failed', 'error']);

        	return back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
    	$data = Testimony::find($id);
    	$request['active'] = ($request->has('active') ? true : false);
        $data->update( $request->except( ['images', '_token'] ));

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/testimony/'.$data['image'])) {
                \File::delete(public_path().'/image/testimony/'.$data['image']);
            }
            $imgName = 'testimony-'.uniqid('', true).'.'.$request->images->extension();
            $request->images->move(public_path('image/testimony'), $imgName);
            $data->update( ['image' => $imgName] );
        }

        Session::flash('alert', ['Update Success', 'Update Testimony Successfuly', 'success']);
        return back();
    }

    public function delete($id)
    {
    	$findData = Testimony::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        if (file_exists(public_path().'/image/testimony/'.$findData['image'])) {
            \File::delete(public_path().'/image/testimony/'.$findData['image']);
        }
        
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete Testimony successfuly'
        ];
    }
}
