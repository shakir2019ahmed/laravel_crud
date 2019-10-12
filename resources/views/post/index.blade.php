@extends('welcome')

@section('content')
     <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <p>
         <a href="{{route('post.create')}}" class="btn btn-danger">Add Post</a>	
        </p>
      
        <table>
        	<tr>
        		<td>Sl NO</td>
        		<td>Post Title</td>
        		<td>Post Detaits</td>
        		<td>Post Category</td>
        		<td>Post Image</td>
        		<td>Action</td>
        	</tr>
        	@foreach($post as $row)
        	<tr>
        		<td>{{$row->id}}</td>
        		<td>{{$row->title}}</td>
        		<td>{{$row->details}}</td>
        		<td>{{$row->name}}</td>
        		<td>
        			<img src="{{URL::to($row->image)}}" style="height: 40px; width: 70px">
        		</td>
        		<td>
        			<a href="{{ URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
        			<a href="{{ URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
        			<a href="{{ URL::to('view/post/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
        		</td>
        	</tr>
        	@endforeach
        </table>
      </div>
    </div>
  </div>

@endsection