<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Models\Blog;

class TestimonyController extends Controller
{
    public function index($id) {
        return view('testimony.index', [
            'testimony' => Testimony::where('blog_id', $id)->get(),
            'blog' => Blog::find($id)
        ]);
    }

    public function create($id) {
        return view('testimony.create', [
            'blog' => Blog::find($id)
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $testimony = new Testimony;
        $testimony->blog_id = $request->blog_id;
        $testimony->title = $request->title;
        $testimony->desc = $request->desc;
        $testimony->save();

        return redirect()->route('testimony.index', $request->blog_id)->with(['success' => 'Testimony Successfully Created']);
    }

    public function edit($id) {
        return view('testimony.edit', [
            'testimony' => Testimony::find($id)
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $testimony = Testimony::find($id);
        $testimony->blog_id = $request->blog_id;
        $testimony->title = $request->title;
        $testimony->desc = $request->desc;
        $testimony->save();

        return redirect()->route('testimony.index', $request->blog_id)->with(['success' => 'Testimony Successfully Updated']);
    }

    public function destroy($id) {
        $testimony = Testimony::find($id);

        $testimony->delete();

        return redirect()->back()->with(['success' => 'Testimony Successfully Deleted']);
    }
}
