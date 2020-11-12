<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Produk::orderBy('id', 'DESC')->get();
    	return view('admin.product.index', ['datas' => $data, 'no' => $no]);
    }

    public function create()
    {
    	return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $description = $request->descriptions;
    	libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {

            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
               preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
               $mimeType = $groups['mime'];
               $imgName = '/image/product-desc/' . uniqid('', true) . '.' . $mimeType;
               $path = public_path() .$imgName;
               file_put_contents($path, file_get_contents($src));
               $image->removeAttribute('src');
               $image->setAttribute('src', $imgName);
            }
 
        }
 
        $description = $dom->saveHTML();
        $request['description'] = $description;

        $imageName = $request->images->getClientOriginalName();;
        $request->images->move(public_path('image/product'), $imageName);

        $imageBanner = $request->banners->getClientOriginalName();;
        $request->banners->move(public_path('image/product'), $imageBanner);

        $request['active'] = ($request->has('active') ? true : false);
        $request['image'] = $imageName;
        $request['banner'] = $imageBanner;
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->name));

        $data = Produk::create( $request->except( ['images', 'banners', '_token'] ));
        if($data){
            Session::flash('alert', ['Insert Success', 'Insert Product Successfuly', 'success']);
            return redirect()->route('admin_product');
        }
        Session::flash('alert', ['Insert Failed', 'Insert Product Failed', 'error']);
        return back()->withInput();
    }

    public function edit($id)
    {
        $data = Produk::find($id);
    	return view('admin.product.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $foundProduk = Produk::find($id);
        if(!$foundProduk) abort(404);

    	$description = $request->descriptions;
        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {

            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
               preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
               $mimeType = $groups['mime'];
               $imgName = '/image/product-desc/' . uniqid('', true) . '.' . $mimeType;
               $path = public_path() .$imgName;
               file_put_contents($path, file_get_contents($src));
               $image->removeAttribute('src');
               $image->setAttribute('src', $imgName);
            }
 
        }
 
        $description = $dom->saveHTML();
        $request['description'] = $description;
        $request['active'] = ($request->has('active') ? true : false);
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->name));

        $foundProduk->update($request->except(['images', 'banners', '_token']));

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['image'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['image']);
            }
            $imageName = $request->images->getClientOriginalName();;
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['image' => $imageName]);
        }
        if($request->hasFile('banners')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner']);
            }
            $imageBanner = $request->banners->getClientOriginalName();;
            $request->banners->move(public_path('image/product'), $imageBanner);
            $foundProduk->update(['banner' => $imageBanner]);
        }

        Session::flash('alert', ['Update Success', 'Update Product Successfuly', 'success']);
        return redirect()->route('admin_product');
    }
    
    public function delete($id)
    {
    	$findData = Produk::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        if (file_exists(public_path().'/image/product/'.$findData['image'])) {
            \File::delete(public_path().'/image/product/'.$findData['image']);
        }
        
        if (file_exists(public_path().'/image/product/'.$findData['banner'])) {
            \File::delete(public_path().'/image/product/'.$findData['banner']);
        }
        
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete sosmed successfuly'
        ];
    }
}
