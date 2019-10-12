@extends('welcome')

@section('content')
     <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
         <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>	
         <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>	
        </p>
      
        <table>
        	<tr>
        		<td>Sl NO</td>
        		<td>Category Name</td>
        		<td>Category slug</td>
        		<td>Action</td>
        	</tr>
        	@foreach($category as $row)
        	<tr>
        		<td>{{$row->id}}</td>
        		<td>{{$row->name}}</td>
        		<td>{{$row->slug}}</td>
        		<td>
        			<a href="{{ URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
        			<a href="{{ URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
        			<a href="{{ URL::to('view/category/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
        		</td>
        	</tr>
        	@endforeach
        </table>
      </div>
    </div>
  </div>

@endsection