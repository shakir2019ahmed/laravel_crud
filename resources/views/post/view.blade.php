@extends('welcome')

@section('content')
     <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      
           <div>
           	
           		<p>Post Title:{{$post->title}}</p>
           		<p>Post Details:{{$post->details}}</p>
           		<p>Post Category:{{$post->name}}</p>
           		<img src="{{URL::to($post->image)}}" >
           	
           </div>
      
      </div>
    </div>
  </div>

@endsection