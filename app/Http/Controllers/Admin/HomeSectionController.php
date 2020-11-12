<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;
use Session;

class HomeSectionController extends Controller
{
    public function index()
    {
        $data = HomeSection::orderBy('id', 'DESC')->get();
    	return view('admin.home-section.index', ['datas' => $data]);
    }

    public function create()
    {
    	return view('admin.home-section.create');
    }

    public function store(Request $request)
    {
    	$request['active'] = ($request->has('active') ? true : false);
        $request['after_product'] = ($request->has('after_product') ? true : false);
        if($request->hasFile('images')){
            $imgName = 'section-'.uniqid('', true).'.'.$request->images->extension();
            $datatest = $request->images->move(public_path('image/home-section'), $imgName);
            $request['image'] = $imgName;
        }

        $data = HomeSection::create($request->except( ['images', '_token'] ));
        if($data){
        	Session::flash('alert', ['Insert Success', 'Insert Home Section Successfuly', 'success']);
        	return redirect()->route('admin_home_section');
        }else{
			Session::flash('alert', ['Insert Error', 'Insert Home Section Failed', 'error']);

        	return back()->withInput();
        }
    }

    public function edit($id)
    {
    	$data = HomeSection::find($id);
    	return view('admin.home-section.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
    	$data = HomeSection::find($id);
    	$request['active'] = ($request->has('active') ? true : false);
        $request['after_product'] = ($request->has('after_product') ? true : false);
        $data->update( $request->except( ['images', '_token'] ));

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/home-section/'.$data['image'])) {
                \File::delete(public_path().'/image/home-section/'.$data['image']);
            }
            $imgName = 'section-'.uniqid('', true).'.'.$request->images->extension();
            $request->images->move(public_path('image/home-section'), $imgName);
            $data->update( ['image' => $imgName] );
        }

        Session::flash('alert', ['Update Success', 'Update Home Section Successfuly', 'success']);
        return redirect()->route('admin_home_section');
    }

    public function doDelete($id)
    {
    	$findData = HomeSection::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        if (file_exists(public_path().'/image/home-section/'.$findData['image'])) {
            \File::delete(public_path().'/image/home-section/'.$findData['image']);
        }
        
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete Home Section successfuly'
        ];
    }
}
