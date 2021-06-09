@extends('layouts.app')
@section('content')
<div class="container">
<div class ="row justify-content-center">
<div class="col-md-10 ">
<div class ="card mt-5">
<div class ="card-header">Books available</div>
<div class="card-body">

<table class="table">
  <thead>
    <tr>
    <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope ="col">Edit</th>
      <th scope ="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @forelse($books as $book)
    <tr>
   
      <td>
      @if($book->image)
     <img src ="{{ Storage::url($book->image) }}" width = "100">
      @else
      <img src ="" width ="100">
      @endif
      <td>{{ $book->name }}</td>
      <td>{{$book->description}}</td>
      <td>{{$book->category}}</td>
      <td><a href="{{ route( "book.edited", $book->id) }}"><i class="fas fa-edit"></i></a>
       </td> 
       <td>
       <form action="{{ route('book.destroy',$book->id) }}" method = "post">
       @csrf
       <input type = "submit" class = "btn btn-danger" value = "Delete">
       </form>
       
       </td>
    </tr>
    @empty
    <td>No books</td>
    @endforelse
    
  </tbody>
</table>
</div>
</div>
{{ $books->links() }}
</div>
</div>
</div>
@endsection

