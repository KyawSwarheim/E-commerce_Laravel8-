<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function add()
    {
        return view('admin.category.add');
    }

    public function create(Request $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'description' => 'required',
        //     'status' => 'required',
        //     'popular' => 'required',
        //     'image' => 'required',
        //     'meta-title' => 'required',
        //     'meta_keywords' => 'required',
        //     'meta-description' => 'required',
        // ]);

        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->save();

        return redirect('categories')->with('status', 'Category add successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->update();

        return redirect('categories')->with('status', 'Category Update successfully');
    }
    public function destory($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category' .$category->id. '/' .$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status','Category Delete successfully');
    }
    static function totalcategory()
    {
        return Category::all()->count();
    }
}
