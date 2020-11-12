<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Session;

class PackageController extends Controller
{
    public function index()
    {
    	$data = Package::orderBy('is_sort', 'ASC')->get();
    	return view('admin.package', ['datas' => $data]);
    }

    public function doCreate(Request $request)
    {
    	$request['active'] = ($request->has('active') ? true : false);
    	$request['highlight'] = ($request->has('highlight') ? true : false);
        $imageName = $request->images->getClientOriginalName();
        $request->images->move(public_path('image/package/'), $imageName);

        $request['image'] = $imageName;

        $data = Package::create($request->except(['_token']));

        Session::flash('alert', ['Insert Success', 'Insert Package Successfuly', 'success']);
        return back();
    }

    public function doUpdate(Request $request, $id)
    {
        $findData = Package::find($id);
        if(!$findData) abort(404);
    	$request['active'] = ($request->has('active') ? true : false);
    	$request['highlight'] = ($request->has('highlight') ? true : false);
        $findData->update($request->except(['images','_token']));

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/package/'.$findData['image'])) {
                \File::delete(public_path().'/image/package/'.$findData['image']);
            }
            $imageName = $request->images->getClientOriginalName();
        	$request->images->move(public_path('image/package/'), $imageName);
            $findData->update( ['image' => $imageName] );
        }

        if($findData){
            Session::flash('alert', ['Update Success', 'Update Package Successfuly', 'success']);
        }else{
            Session::flash('alert', ['Update Failed', 'Update Package Failed', 'error']);
        }

        return back();
    }

    public function doDelete($id)
    {
    	$findData = Package::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data Package found'
            ];
        }
        if (file_exists(public_path().'/image/package/'.$findData['image'])) {
            \File::delete(public_path().'/image/package/'.$findData['image']);
        }
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete Package successfuly'
        ];
    }
}
