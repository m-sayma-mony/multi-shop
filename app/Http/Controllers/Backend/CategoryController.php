<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
// category add korar function create    
    public function create(){
        return view('backend.categories.create');
    }

// category database e pathanor function    
    public function store(Request $request){
        $request->validate([
            'name' => 'required | max: 20',
            'price' => 'required',
            'image' => 'image'
        ], [
            'name.required' => 'Please give a category name',
            'name.max' => 'Please must less than 20 character',
            'price.required' => 'Please give price'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $image = $request->image;

        if($image){
            $path = 'assets/category-images/';
            $imageName = time().rand().'.'.$image->extension();

            $image->move($path, $imageName);
            $category->image = $path.$imageName;
        }

        $category->save();

        return back()->with('message', 'Category Added Successfully');
    }   
    
// manage page view korabe index function   
    public function index(){
        return view('backend.categories.index', ['categories' => Category::all()]);
    }

// edit button e click korle edit page show korbe
    public function edit(int $id){
        return view('backend.categories.edit', ['categories' => Category::find($id)]);
    }

// edit korar por notun kono kichu modify korar jonno update function use kora hoy
    public function update(Request $request, int $id){
        $request->validate([
            'name' => 'required | max: 20',
            'price' => 'required',
            'image' => 'image'
        ], [
            'name.required' => 'Please give a category name',
            'name.max' => 'Please must less than 20 character',
            'price.required' => 'Please give price'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $image = $request->image;
        if($image){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $path = 'assets/category-images/';
            $imageName = time().rand().'.'.$image->extension();

            $image->move($path, $imageName);
            $category->image = $path.$imageName;
        }

        $category->save();

        return back()->with('message', 'Category Updated Successfully');
    }   
    
// manage page theke category delete kora hoy delete function dara
    public function delete(int $id){
        $category = Category::find($id);

        if($category->image){
            if(file_exists($category->image)){
                unlink($category->image);
            }
        }

        $category->delete();

        return back()->with('message', 'Category Deleted Successfully');
    }    
}
