@extends('welcome')

@section('content')
     <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
         <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>	
         <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>	
        </p>
       @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        <form action="{{route('store.category')}}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="name" placeholder="Title">
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Slug</label>
              <input type="text" class="form-control" name="slug" placeholder="Slug">
            </div>
          </div>    

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection