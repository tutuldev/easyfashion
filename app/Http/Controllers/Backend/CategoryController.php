<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
          $categories = Category::withCount('products')->paginate(10);
        return view("backend.categories.index", compact("categories"));
    }


    public function create()
    {
        return view('backend.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')
                         ->with('status', 'New Category Added Successfully.');
    }

    public function show(Category $category)
    {
        $category->loadCount('products');//for count post with category
        return view('backend.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')
                         ->with('status', 'Category Updated Successfully.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('status', 'Category Deleted Successfully.');
    }
}
