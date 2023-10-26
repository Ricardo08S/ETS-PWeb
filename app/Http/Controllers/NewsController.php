<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $news = News::all();
        return view('news.view', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Rename the file
        $imageName = time() . '.' . $request->image->extension();

        // Where to store files
        $request->image->move(public_path('images'), $imageName);

        $news = new News;

        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category_id');
        $news->image = $imageName;

        $news->save();

        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('news.detail', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();

        return view('news.edit', ['news' => $news, 'categories' => $categories]);
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
        // validation
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $news = News::find($id);

        if ($request->has('image')) {
            $path = "images/";
            File::delete($path . $news->image);

            $image_name = time() . "." . $request->image->extension();

            $request->image->move(public_path('image'), $image_name);

            $news->image = $image_name;
        }

        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category_id');

        $news->save();

        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        
        $path = "images/";
        File::delete($path . $news->image);

        $news->delete();

        return redirect("/news");
    }
}
