<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateFormRequest;

class BookController extends Controller
{
 public function index()
 
 {
     $books = Book::paginate(3);
     return view("Book.index",compact('books'));
 }
 public function create()
 {
     return view("Book.create");
 }
 public function store(BookRequest $request)
 {
$image = $request->file('image')->store('public/images/');

     Book::create([
         'name'=>$request->name,
         'description'=>$request->desc,
         'category'=>$request->category,
         'image'=>$image
     ]);
     return back()->with('message','New book added');
 }

//  public function edit($id)
//  {
//      dd($id);
//  }
public function edit($id)
{
    $book= Book::findOrFail($id);
    return view("book.edit",compact('book'));
}
public function update(UpdateFormRequest $request,$id)
{
    $book= Book::findOrFail($id);
   
    if($request->hasFile('image'))
    {
       
     $image= $request->file('image')->store('public/images/');
     $book->name = $request->name;
     $book->description = $request->desc;
     $book->category = $request->category;
     $book->image=$image;
     $book->save();
    
    }else{
        $book->name = $request->name;
        $book->description = $request->desc;
        $book->category = $request->category;
        
        $book->save();
    }
    
    
    return redirect()->route('book.index')->with('message','Book Updated');
}
 public function delete($id)
 {
     $book = Book::findOrFail($id);
     $book->delete();
     return redirect()->route('book.index')->with('message',"Deleted Succesfully");
 }
}
