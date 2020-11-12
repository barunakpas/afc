<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukBenefit;
use App\Models\ProdukPaten;
use App\Models\ProdukResolve;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Produk::select('id', 'name', 'price', 'promo_price', 'active')->orderBy('id', 'DESC')->get();
    	return view('admin.product.index', ['datas' => $data, 'no' => $no]);
    }

    public function create()
    {
    	return view('admin.product.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('banners')){
            $imageName = 'banner-small-'.uniqid('', true).'.'.$request->banners->extension();
            $request->banners->move(public_path('image/product'), $imageBanner);
            $request['banner_small'] = $imageName;
        }

        $request['active'] = ($request->has('active') ? true : false);
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->name));

        $data = Produk::create( $request->except(['banners', '_token'] ));
        if($data){
            Session::flash('alert', ['Insert Success', 'Insert Product Successfuly', 'success']);
            return redirect()->route('admin_product');
        }
        Session::flash('alert', ['Insert Failed', 'Insert Product Failed', 'error']);
        return back()->withInput();
    }

    public function edit($id)
    {
        $data = Produk::select('id', 'name', 'price', 'promo_price', 'active', 'banner_small', 'whatsapp_message')->find($id);
    	return view('admin.product.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $foundProduk = Produk::find($id);
        if(!$foundProduk) abort(404);

        $request['active'] = ($request->has('active') ? true : false);
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->name));

        $foundProduk->update($request->except(['banners', '_token']));

        if($request->hasFile('banners')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner']);
            }
            $imageBanner = 'banner-small-'.uniqid('', true).'.'.$request->banners->extension();
            $request->banners->move(public_path('image/product'), $imageBanner);
            $foundProduk->update(['banner_small' => $imageBanner]);
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
        if (file_exists(public_path().'/image/product/'.$findData['banner_1'])) {
            \File::delete(public_path().'/image/product/'.$findData['banner_1']);
        }
        if (file_exists(public_path().'/image/product/'.$findData['banner_2'])) {
            \File::delete(public_path().'/image/product/'.$findData['banner_2']);
        }
        if (file_exists(public_path().'/image/product/'.$findData['banner_3'])) {
            \File::delete(public_path().'/image/product/'.$findData['banner_3']);
        }
        
        $del = $findData->delete();
        if($del){
            $ben = ProdukBenefit::where('product_id', $id)->delete();
            $pat = ProdukPaten::where('product_id', $id)->delete();
            $reso = ProdukResolve::where('product_id', $id)->delete();
        }
        return [
            'status' => 200,
            'message' => 'Delete sosmed successfuly'
        ];
    }

    public function show($id)
    {
        $data = Produk::find($id);
        return view('admin.product.show', ['data' => $data]);
    }

    public function updateSection1(Request $request)
    {
        $foundProduk = Produk::find($_GET['id']);
        if(!$foundProduk) abort(404);
        $foundProduk->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner']);
            }
            $imageName = 'section-'.$_GET['id'].'-1-.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['banner' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Section 1 Successfuly', 'success']);
        return back();
    }

     public function updateSection2(Request $request)
    {
        $foundProduk = Produk::find($_GET['id']);
        if(!$foundProduk) abort(404);
        $foundProduk->update([
            'title_1' => $request->title,
            'description_1' => $request->description
        ]);

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['image'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['image']);
            }
            $imageName = 'section-'.$_GET['id'].'-2-.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['image' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Section 2 Successfuly', 'success']);
        return back();
    }

    public function updateSection4(Request $request)
    {
        $foundProduk = Produk::find($_GET['id']);
        if(!$foundProduk) abort(404);

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner_1'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner_1']);
            }
            $imageName = 'section-'.$_GET['id'].'-4-.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['banner_1' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Section 4 Successfuly', 'success']);
        return back();
    }

     public function updateSection5(Request $request)
    {
        $foundProduk = Produk::find($_GET['id']);
        if(!$foundProduk) abort(404);
        $foundProduk->update([
            'title_2' => $request->title,
            'description_2' => $request->description
        ]);

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner_2'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner_2']);
            }
            $imageName = 'section-'.$_GET['id'].'-5-.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['banner_2' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Section 5 Successfuly', 'success']);
        return back();
    }

    public function updateSection8(Request $request)
    {
        $foundProduk = Produk::find($_GET['id']);
        if(!$foundProduk) abort(404);
        $foundProduk->update([
            'title_3' => $request->title
        ]);

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/product/'.$foundProduk['banner_3'])) {
                \File::delete(public_path().'/image/product/'.$foundProduk['banner_3']);
            }
            $imageName = 'section-'.$_GET['id'].'-8-.'.$request->images->extension();
            $request->images->move(public_path('image/product'), $imageName);
            $foundProduk->update(['banner_3' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Section 8 Successfuly', 'success']);
        return back();
    }
}
