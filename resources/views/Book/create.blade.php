@extends('layouts.app')
@section('content')
<div class="container">
<div class ="row justify-content-center">
<div class="col-md-8 ">
@if(Session::has('message'))
<div class = "alert alert-success">
{{Session::get('message')}}
</div>
@endif
<div class ="card mt-5">
<div class ="card-header">Create new book</div>
<div class="card-body">
<form action="{{ route('book.store') }}" method ='POST' enctype="multipart/form-data"> 
@csrf 
<label> Name of Book </label>
<input type ="text" name ="name" class="form-control" placeholder="Name of book">
@if($errors->has('name'))
<span class ="text-danger">{{$errors->first('name')}}</span>
@endif
<br>
<label>Description</label>
<input type ="textarea" class="form-control" name="desc" placeholder="Description">
@if($errors->has('desc'))
<span class ="text-danger">{{ $errors->first('desc')}} </span>
@endif
<br>
<label>Category</label>
<select name ="category" class="form-control">
<option value="">Select</option>
<option value="fictional">fictional</option>
<option value="comedy">comedy</option>
<option value="educational">educational</option>
</select>
@if($errors->has('category'))
<span class="text-danger">{{$errors->first('category')}}</span>

@endif<br>
<label>Image of book</label>
<input type ="file" class="form-control" name="image" placeholder="Image">
@if($errors->has('image'))
<span class ="text-danger">{{ $errors->first('image')}} </span>
@endif
<br>
<input type ="submit" value ="submit" class ="btn btn-primary">
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
