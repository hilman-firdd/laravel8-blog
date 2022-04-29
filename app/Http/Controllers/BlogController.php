<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index', [
            'blog' => Blog::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs',
            'body' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->category_id = $request->category;
        $blog->body = $request->body;
        $blog->view = 0;

        $tujuan_upload = 'img/blog';

        if($request->hasFile('image1') == true){
    
            $file1 = $request->file('image1');
            $nama_file1 = time()."".$file1->getClientOriginalName();    
            
            $file1->move($tujuan_upload,$nama_file1);
            $blog->gambar1 = $nama_file1;
        }

        if($request->hasFile('image2') == true){
    
            $file2 = $request->file('image2');
            $nama_file2 = time()."".$file2->getClientOriginalName();
    
            $file2->move($tujuan_upload,$nama_file2);
            $blog->gambar2 = $nama_file2;
        }

        if($request->hasFile('image3') == true){
    
            $file3 = $request->file('image3');
            $nama_file3 = time()."".$file3->getClientOriginalName();
    
            $file3->move($tujuan_upload,$nama_file3);
            $blog->gambar3 = $nama_file3;
        }

        if($request->hasFile('image4') == true){
    
            $file4 = $request->file('image4');
            $nama_file4 = time()."".$file4->getClientOriginalName();
    
            $file4->move($tujuan_upload,$nama_file4);
            $blog->gambar4 = $nama_file4;
        }

        if($request->hasFile('image5') == true){
    
            $file5 = $request->file('image5');
            $nama_file5 = time()."".$file5->getClientOriginalName();
    
            $file5->move($tujuan_upload,$nama_file5);
            $blog->gambar5 = $nama_file5;
        }

        $blog->save();

        return redirect()->route('blog.index')->with(['success' => 'Blog Successfully Created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog.edit', [
            'blog' => Blog::find($id),
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->category_id = $request->category;
        $blog->body = $request->body;

        $tujuan_upload = 'img/blog';

        if($request->hasFile('image1') == true){

            $local1 = "img/blog/".$blog->gambar1;
            File::delete($local1);
    
            $file1 = $request->file('image1');
            $nama_file1 = time()."".$file1->getClientOriginalName();    
            
            $file1->move($tujuan_upload,$nama_file1);
            $blog->gambar1 = $nama_file1;
        }

        if($request->hasFile('image2') == true){

            $local2 = "img/blog/".$blog->gambar2;
            File::delete($local2);
    
            $file2 = $request->file('image2');
            $nama_file2 = time()."".$file2->getClientOriginalName();
    
            $file2->move($tujuan_upload,$nama_file2);
            $blog->gambar2 = $nama_file2;
        }

        if($request->hasFile('image3') == true){

            $local3 = "img/blog/".$blog->gambar3;
            File::delete($local3);
    
            $file3 = $request->file('image3');
            $nama_file3 = time()."".$file3->getClientOriginalName();
    
            $file3->move($tujuan_upload,$nama_file3);
            $blog->gambar3 = $nama_file3;
        }

        if($request->hasFile('image4') == true){

            $local4 = "img/blog/".$blog->gambar4;
            File::delete($local4);
    
            $file4 = $request->file('image4');
            $nama_file4 = time()."".$file4->getClientOriginalName();
    
            $file4->move($tujuan_upload,$nama_file4);
            $blog->gambar4 = $nama_file4;
        }

        if($request->hasFile('image5') == true){

            $local5 = "img/blog/".$blog->gambar5;
            File::delete($local5);
    
            $file5 = $request->file('image5');
            $nama_file5 = time()."".$file5->getClientOriginalName();
    
            $file5->move($tujuan_upload,$nama_file5);
            $blog->gambar5 = $nama_file5;
        }

        $blog->save();

        return redirect()->route('blog.index')->with(['success' => 'Blog Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $image1 = "img/blog/".$blog->gambar1;
        File::delete($image1);
        $image2 = "img/blog/".$blog->gambar2;
        File::delete($image2);
        $image3 = "img/blog/".$blog->gambar3;
        File::delete($image3);
        $image4 = "img/blog/".$blog->gambar4;
        File::delete($image4);
        $image5 = "img/blog/".$blog->gambar5;
        File::delete($image5);

        $blog->delete();

        return redirect()->route('blog.index')->with(['success' => 'Blog Successfully Deleted']);

    }
}
