<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\AddBookRequest;
use App\Http\Requests\Book\EditBookRequest;
use App\Http\Traits\FileSystem;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Publisher;
use Exception;

class BookController extends Controller
{
   use FileSystem;

   public function index()
   {
      $books = Book::with([
         'publisher','category'
      ])->paginate(10);
      return view('admin.pages.books.index', compact('books'));
   }

   public function edit(Book $book)
   {
      try {
         $book = Book::findOrFail($book->id);
         $categories = Category::all();
         $publishers = Publisher::all();
         $books = Book::with([
         'publisher','category'
      ])->paginate(10);
         return view('admin.pages.books.edit', compact([
            'book','publishers','categories'
         ]));
      } catch (Exception $e) {
         return response()->back()->with('errors', 'No such Book');
      }

   }

      public function update(EditBookRequest $request, Book $book)
   {
      $book = Book::where('id', $book->id)->first();
      if ($book) {
         $book->title = $request->title;
         $book->description = $request->description;
         $book->author = $request->author;
         $book->price = $request->price;
         $book->stock_quantity = $request->stock_quantity;
         $book->discount = $request->discount;
         $book->price_after_discount = $request->price_after_discount;
         $book->category_id = $request->category_id;
         $book->publisher_id = $request->publisher_id;

         if (isset($request->image)) {
            $this->deleteImage('/books' . '/' . $book->image);
            $image_name = $this->uploadImage('books');
            $book->image = $image_name;
         }
         $book->save();
         return to_route('books.index')->with('success', 'Book Updated Successfully');
      }
      return to_route('books.index')->with('errors', 'No such Book');
   }

   public function add()
   {
      $publishers = Publisher::all();
      $categories = Category::all();
      return view(
         'admin.pages.books.add',
         compact([
            'publishers',
            'categories'
         ])
      );
   }

   public function store(AddBookRequest $request)
   {
      $image_name = $this->uploadImage('books');
      $book = new Book();
      $book->title = $request->title;
      $book->isbn_code = $request->isbn_code;
      $book->image = $image_name;
      $book->description = $request->description;
      $book->author = $request->author;
      $book->price = $request->price;
      $book->stock_quantity = $request->stock_quantity;
      $book->price_after_discount = $request->price_after_discount;
      $book->category_id = $request->category_id;
      $book->publisher_id = $request->publisher_id;
      $book->discount = $request->discount;
      $book->save();

      return to_route('books.index')->with('success', 'Book Added Successfully');
   }
   public function destroy(Book $book)
   {
     $inside_an_order = $book->orders()->exists();
     if($inside_an_order){
   return to_route('books.index')
   ->with('errors', 'Book Can\'t be Deleted Because its inside an order');
     }
      $this->deleteImage('/books' . "/" . $book->image);
      $book->delete();
      return to_route('books.index')->with('success', 'Book Deleted Successfully');
   }


}
