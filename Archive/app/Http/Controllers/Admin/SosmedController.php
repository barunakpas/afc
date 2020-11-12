<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sosmed;
use Session;

class SosmedController extends Controller
{
    public function index()
    {
    	$data = Sosmed::get();
    	return view('admin.sosmed', ['datas' => $data]);
    }

    public function doCreate(Request $request)
    {
    	$request['active'] = ($request->has('active') ? true : false);
        $data = Sosmed::create($request->except(['_token']));
        Session::flash('alert', ['Insert Success', 'Insert Sosmed Successfuly', 'success']);
        return back();
    }

    public function doUpdate(Request $request, $id)
    {
        $findData = Sosmed::find($id);
        if(!$findData) abort(404);
    	$request['active'] = ($request->has('active') ? true : false);
        $findData->update($request->except(['_token']));
        if($findData){
            Session::flash('alert', ['Update Success', 'Update Sosmed Successfuly', 'success']);
        }else{
            Session::flash('alert', ['Update Failed', 'Update Sosmed Failed', 'error']);
        }
        return back();

    }

    public function doDelete($id)
    {
    	$findData = Sosmed::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete sosmed successfuly'
        ];
    }
}
