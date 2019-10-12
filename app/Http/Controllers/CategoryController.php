<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

 public function allCategory()
 {
 	$category=DB::table('categories')->get();
 	return view('category.view',compact('category'));
 }

    public function addCategory()
    {
    	return view('category.index');
    }

    public function StoreCategory(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25',
        'slug' => 'required|unique:categories|max:25',
       ]);

    	$data=array();
    	$data['name'] =$request->name;
    	$data['slug'] =$request->slug;
    	$category=DB::table('categories')->insert($data);
    	return redirect()->back();
    }

    public function CategoryView($id)
    {
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('category.dataview')->with('category',$category);
    }

    public function CategoryDelete($id)
    {
        $delete=DB::table('categories')->where('id',$id)->delete();
        return redirect()->back();
    }

     public function CategoryEdit($id)
    {
       $category=DB::table('categories')->where('id',$id)->first();
        return view('category.editcategory',compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:25',
        'slug' => 'required|max:25',
       ]);

        $data=array();
        $data['name'] =$request->name;
        $data['slug'] =$request->slug;
        $category=DB::table('categories')->update($data);
        return redirect()->back();
    }
    

}
