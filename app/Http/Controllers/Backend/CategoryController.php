<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imagePath,
        ]);

        return redirect()->route('categories.index')
                         ->with('status', 'New Category Added Successfully.');
    }

    public function show(Category $category)
    {
        $category->loadCount('products');//for count post with category
        return view('backend.categories.show', compact('category'));
    }


    // singel category show

    public function singleCategoryShow($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();


        $products = $category->products()->latest()->get();

        return view('singel-category', compact('category', 'products'));
    }




    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }


  public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
        } elseif ($request->input('remove_image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = null;
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imagePath,
        ]);

        return redirect()->route('categories.index')
                         ->with('status', 'Category Updated Successfully.');
    }

   public function destroy(Category $category)
    {
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')
                         ->with('status', 'Category Deleted Successfully.');
    }
}
