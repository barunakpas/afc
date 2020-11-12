<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\HomeSlider;
use App\Models\About;
use App\Models\Produk;
use App\Models\Package;
use App\Models\Blog;
use Session;

class PageController extends Controller
{
    public function dashboard()
    {
        $products = Produk::orderBy('view', 'DESC')->get();
        $NoNews = Blog::count();
        $NoPackage = Package::count();
        $NoProduct = count($products);
        $tempProd = [];
        foreach($products as $product){
            $datas = [
                'label' => $product->name,
                'value' => $product->view
            ];
            array_push($tempProd, $datas);
        }
    	return view('admin.dashboard', [
            'products' => $products,
            'noNews' => $NoNews,
            'noPackage' => $NoPackage,
            'noProduct' => $NoProduct,
            'tempProdJosn' => $tempProd
        ]);
    }

    public function general()
    {
        $data = General::first();
    	return view('admin.general', ['data' => $data]);
    }

    public function generalUpdate(Request $request)
    {
        $data = General::first();

        $data->update( $request->except( ['logo', 'favicon', '_token'] ));

        if($request->hasFile('logo')){
            if (file_exists(public_path().'/image/'.$data['logo'])) {
                \File::delete(public_path().'/image/'.$data['logo']);
            }
            $logoName = 'logo.'.$request->logo->extension();
            $request->logo->move(public_path('image'), $logoName);
            $data->update( ['logo' => $logoName] );
        }

        if($request->hasFile('favicon')){
            if (file_exists(public_path().'/image/'.$data['favicon'])) {
                \File::delete(public_path().'/image/'.$data['favicon']);
            }
            $faviconName = 'favicon.'.$request->favicon->extension();
            $request->favicon->move(public_path('image'), $faviconName);
            $data->update( ['favicon' => $faviconName] );
        }

        Session::flash('alert', ['Update Success', 'Update Successfuly', 'success']);
        return back();

    }

    public function slider()
    {
        $data = HomeSlider::first();
    	return view('admin.slider', ['data' => $data]);
    }

    public function sliderUpdate(Request $request)
    {
    	$data = HomeSlider::first();

        $data->update( $request->except( ['banner', '_token'] ));

        if($request->hasFile('banner')){
            if (file_exists(public_path().'/image/'.$data['banner'])) {
                \File::delete(public_path().'/image/'.$data['banner']);
            }
            $bannerName = 'banner_home.'.$request->banner->extension();
            $request->banner->move(public_path('image'), $bannerName);
            $data->update( ['banner' => $bannerName] );
        }

        Session::flash('alert', ['Update Success', 'Update Home Slider Successfuly', 'success']);
        return back();
    }

    public function about()
    {
        $data = About::first();
    	return view('admin.about', ['data' => $data]);
    }

    public function aboutUpdate(Request $request)
    {
    	$data = About::first();

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
               $imgName = '/image/about-desc/' . uniqid('', true) . '.' . $mimeType;
               $path = public_path() .$imgName;
               file_put_contents($path, file_get_contents($src));
               $image->removeAttribute('src');
               $image->setAttribute('src', $imgName);
            }
 
        }
 
        $description = $dom->saveHTML();
        $request['description'] = $description;

        $data->update( $request->except( ['banner', '_token'] ));

        if($request->hasFile('banner')){
            if (file_exists(public_path().'/image/'.$data['banner'])) {
                \File::delete(public_path().'/image/'.$data['banner']);
            }
            $bannerName = 'about.'.$request->banner->extension();
            $request->banner->move(public_path('image'), $bannerName);
            $data->update( ['banner' => $bannerName] );
        }

        Session::flash('alert', ['Update Success', 'Update About Successfuly', 'success']);
        return back();
    }
}
