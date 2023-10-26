<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('categories.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        // validation
        $request->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required'
        ]);

        // Add data to the categories table database
        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect('/category');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('categories.view', ['categories' => $categories]);
    }

    public function show($id)
    {
        $categories = DB::table('categories')->find($id);

        return view('categories.detail', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->find($id);

        return view('categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required'
        ]);

        // Edit data to the categories table database
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);

        return redirect('/category');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        return redirect('/category');
    }
}
