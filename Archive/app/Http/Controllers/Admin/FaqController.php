<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Session;

class FaqController extends Controller
{
    public function index()
    {
    	$data = Faq::orderBy('is_sort', 'ASC')->get();
    	return view('admin.faq', ['datas' => $data]);
    }

    public function doCreate(Request $request)
    {
    	$request['active'] = ($request->has('active') ? true : false);
        $data = Faq::create($request->except(['_token']));
        Session::flash('alert', ['Insert Success', 'Insert Faq Successfuly', 'success']);
        return back();
    }

    public function doUpdate(Request $request, $id)
    {
        $findData = Faq::find($id);
        if(!$findData) abort(404);
    	$request['active'] = ($request->has('active') ? true : false);
        $findData->update($request->except(['_token']));
        if($findData){
            Session::flash('alert', ['Update Success', 'Update Faq Successfuly', 'success']);
        }else{
            Session::flash('alert', ['Update Failed', 'Update Faq Failed', 'error']);
        }
        return back();
    }

    public function doDelete($id)
    {
    	$findData = Faq::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete faq successfuly'
        ];
    }
}
