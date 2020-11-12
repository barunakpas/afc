<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Session;

class BlogController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blog.index', ['datas' => $data, 'no' => $no]);
    }

    public function create()
    {
        return view('admin.blog.create');
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
               $imgName = '/image/blog-desc/' . uniqid('', true) . '.' . $mimeType;
               $path = public_path() .$imgName;
               file_put_contents($path, file_get_contents($src));
               $image->removeAttribute('src');
               $image->setAttribute('src', $imgName);
            }
 
        }
 
        $description = $dom->saveHTML();
        $request['desc'] = $description;

        $imageName = $request->images->getClientOriginalName();;
        $request->images->move(public_path('image/blog'), $imageName);

        $request['active'] = ($request->has('active') ? true : false);
        $request['image'] = $imageName;
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->title));

        $data = Blog::create( $request->except( ['images', '_token'] ));
        if($data){
            Session::flash('alert', ['Insert Success', 'Insert Blog Successfuly', 'success']);
            return redirect()->route('admin_blog');
        }
        Session::flash('alert', ['Insert Failed', 'Insert Blog Failed', 'error']);
        return back()->withInput();
    }

    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $foundBlog = Blog::find($id);
        if(!$foundBlog) abort(404);

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
        $request['desc'] = $description;
        $request['active'] = ($request->has('active') ? true : false);
        $request['slug'] = strtolower(preg_replace('/\s+/', '-', $request->title));

        $foundBlog->update($request->except(['images', '_token']));

        if($request->hasFile('images')){
            if (file_exists(public_path().'/image/blog/'.$foundBlog['image'])) {
                \File::delete(public_path().'/image/blog/'.$foundBlog['image']);
            }
            $imageName = $request->images->getClientOriginalName();;
            $request->images->move(public_path('image/blog'), $imageName);
            $foundBlog->update(['image' => $imageName]);
        }

        Session::flash('alert', ['Update Success', 'Update Blog Successfuly', 'success']);
        return redirect()->route('admin_blog');
    }
    
    public function delete($id)
    {
        $findData = Blog::find($id);
        if(!$findData){
            return [
                'status' => 401,
                'message' => 'Data not found'
            ];
        }

        if (file_exists(public_path().'/image/blog/'.$findData['image'])) {
            \File::delete(public_path().'/image/blog/'.$findData['image']);
        }
        
        $findData->delete();
        return [
            'status' => 200,
            'message' => 'Delete blog successfuly'
        ];
    }
}
