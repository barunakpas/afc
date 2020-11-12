<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\Produk;
use App\Models\HomeSection;
use App\Models\Package;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Email;
use App\Models\About;
use App\Models\Testimony;
use App\Models\Sosmed;
use App\Helpers\GeneralHelper;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;

class PageFrontController extends Controller
{
    public function home()
    {
    	$home_slider = HomeSlider::first();
    	$products = Produk::active()->get();
        $homeSection = HomeSection::active()->orderBy('is_sort', 'ASC')->get();
        $packages = Package::active()->orderBy('is_sort', 'ASC')->get();
        $blogs = Blog::select('image', 'title', 'view', 'slug', 'created_at')->active()->orderBy('id', 'DESC')->limit(3)->get();
        $faqs = Faq::active()->orderBy('is_sort', 'ASC')->limit(5)->get();

    	return view('frontend.home', [
    		'home_slider' => $home_slider,
    		'products' => $products,
            'homeSections' => $homeSection,
            'packages' => $packages,
            'blogs' => $blogs,
            'faqs' => $faqs,
            'seo' => [
                'title' => 'Afc Better Life',
                'sort-desc' => 'Memperkenalkan Terobosan Ilmiah Modern Teknologi Jepang & Inggris Raya',
                'keyword' => 'afc,betterlife,healty,salmon'
            ]
    	]);
    }

    public function product($slug)
    {
        $data = Produk::active()->slug($slug)->first();
        if(isset($data->view)){
            $view = $data->view + 1;
            $data->update(['view' => $view]);
        }
    	return view('frontend.product', [
            'data' => $data,
            'seo' => [
                'title' => $data->name,
                'sort-desc' => $data->sort_desc,
                'keyword' => ''
            ]
        ]);
    }

    public function news()
    {
        $data = Blog::active();
        if(isset($_GET['searchKey'])){
            $data->where('title', 'like', '%'.$_GET['searchKey'].'%')
            ->orWhere('sort_desc', 'like', '%'.$_GET['searchKey'].'%')
            ->orWhere('desc', 'like', '%'.$_GET['searchKey'].'%');
        }
        $datas = $data->orderBy('created_at', 'DESC')->limit(15)->get();

    	return view('frontend.news', [
            'datas' => $datas,
            'seo' => [
                'title' => 'Berita Mengenai SOP 100+ dari AFC',
                'sort-desc' => '',
                'keyword' => ''
            ]
        ]);
    }

    public function newsDetail($slug)
    {
        $data = Blog::active()->slug($slug)->first();
        if(!$data) abort(404);
        if(isset($data->view)){
            $view = $data->view + 1;
            $data->update(['view' => $view]);
        }

        $resentPost = Blog::active()->where('slug', '!=', $slug)->orderBy('created_at', 'DESC')->limit(3)->get();

    	return view('frontend.news-detail', [
            'data' => $data,
            'resentPosts' => $resentPost,
            'seo' => [
                'title' => $data->title,
                'sort-desc' => $data->sort_desc,
                'keyword' => ''
            ]
        ]);
    }

    public function testimony()
    {
        $testimonies = Testimony::active()->get();
        $products = Produk::select('id', 'name')->active()->orderBy('name', 'ASC')->get();
    	return view('frontend.testimony', [
            'testimonies' => $testimonies,
            'products' => $products,
            'seo' => [
                'title' => 'Testimoni Konsumen SOP 100+',
                'sort-desc' => 'Simak Apa Kata Mereka Yang Tersenyum Bahagia Setelah Mengkonsumsi SOP100+, SOP SUBARASHI & UTSUKUSHHII',
                'keyword' => ''
            ]
         ]);
    }

    public function contact()
    {
    	return view('frontend.contact', [
            'seo' => [
                'title' => 'Hubungi AFC',
                'sort-desc' => 'Ingin membeli produk SOP 100+ dari AFC, langsung saja hubungi kami disini',
                'keyword' => ''
            ]
        ]);
    }

    public function sendEmail(Request $request)
    {
        $data = Email::create($request->all());
        Mail::to(GeneralHelper::general()->email)->send(new UserEmail($request->all()));
        if(!$data){
            return [
                'status' => '403',
                'message' => 'Send data gagal, silahkan kirim ulang atau hubungi admin...'
            ];
        }

        return [
            'status' => '200',
            'message' => 'Send data berhasil, anda akan di hubungi oleh admin AFC dalam waktu kurang dari 24 jam, Terimakasih'
        ];

    }

    public function faq()
    {
        $faqs = Faq::active()->orderBy('is_sort', 'ASC')->get();
    	return view('frontend.faq', ['faqs' => $faqs]);
    }

    public function about()
    {
        $data = About::first();
    	return view('frontend.about', ['data' => $data]);
    }
}
