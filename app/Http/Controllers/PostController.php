<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function writepost()
    {
    	$category=DB::table('categories')->get();
    	return view('post.create',compact('category'));
    }


     public function Store(Request $request)
    {
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    		if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/image/post/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
             return Redirect()->back();
    	}else{
    		 DB::table('posts')->insert($data);
             return Redirect()->back();
    	}	
    }

    public function ViewPost()
    {
    	// $post=DB::table('posts')->get();
    	$post=DB::table('posts')
    	      ->join('categories','posts.category_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->get();
    	return view('post.index',compact('post'));
    }

    public function PostView($id)
    {
    	//$post=DB::table('posts')->where('id',$id)->first();
    	$post=DB::table('posts')
    	      ->join('categories','posts.category_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->where('posts.id',$id)
    	      ->first();
    	return view('post.view')->with('post',$post);
    }


    public function PostEdit($id)
    {
    	$category=DB::table('categories')->get();
    	$post=DB::table('posts')->first();
    	return view('post.edit',compact('category','post'));
    }


    public function PostUpdate(Request $request,$id)
    {
    	 $validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
	    $image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
             
             return redirect()->back();
    	}else{
    		 $data['image']=$request->old_photo;
    		 DB::table('posts')->where('id',$id)->update($data);
    		 
             return redirect()->back();
    	}
    }

    public function PostDelete($id)
    {
    	$post=DB::table('posts')->where('id',$id)->first();
    	$image=$post->image;
    	$delete=DB::table('posts')->where('id',$id)->delete();
    	if ($delete) {
    		unlink($image);
    		
             return Redirect()->back();
    	}else{
    		
             return Redirect()->back();
    	}
    }
}
