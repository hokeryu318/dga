<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id', '0')->orWhere('parent_id', null)->get();
        return view('admin.category.index')->with('categories', $categories);
    }

    public function list($id){
        $categories = Category::where('parent_id', $id)->get();
        return view('admin.category.index')->with('categories', $categories);
    }

    public function add(){
        $parents = Category::all();
        return view('admin.category.add')->with('parents', $parents);
    }

    public function add_post(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->save();
        return Redirect::to(url('admin/category/list/'.$request->parent));
    }

    public function edit($id){
        $parents = Category::where('id', '<>', $id)->get();
        $category = Category::find($id);
        return view('admin.category.edit')->with('parents', $parents)->with('obj', $category);
    }

    public function edit_post(Request $request){
        $category = Category::find($request->category_id);
        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->save();
        return Redirect::to(url('admin/category/list/'.$request->parent));
    }
}
