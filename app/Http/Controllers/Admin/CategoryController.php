<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Http\Traits\FileSystem;
use App\Models\Book;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{

   use FileSystem;

   public function index()
   {
      $categories = Category::paginate(10);
      return view('admin.pages.categories.index', compact('categories'));
   }

   public function edit(Category $category)
   {
      try {
         $category = Category::findOrFail($category->id);
         return view('admin.pages.categories.edit', compact('category'));
      } catch (Exception $e) {
         return response()->back()->with('errors', 'No such category');
      }

   }

   public function update(EditCategoryRequest $request, Category $category)
   {
      $category = Category::where('id', $category->id)->first();
      if ($category) {
         $category->title = $request->title;
         if (isset($request->image)) {
            $this->deleteImage('/categories' . '/' . $category->image);
            $image_name = $this->uploadImage('categories');
            $category->image = $image_name;
         }
         $category->save();
         return to_route('categories.index')->with('success', 'Category Updated Successfully');
      }
      return to_route('categories.index')->with('errors', 'No such category');
   }

   public function add()
   {
      return view('admin.pages.categories.add');
   }

   public function store(AddCategoryRequest $request)
   {
      $image_name = $this->uploadImage('categories');
      $category = new Category();
      $category->title = $request->title;
      $category->image = $image_name;
      $category->save();

      return to_route('categories.index')->with('success', 'Category Added Successfully');
   }

   public function destroy(Category $category)
   {
      $has_books = Book::where('category_id',$category->id)->exists();
      if ($has_books) {
         return to_route('categories.index')->with('error', 'This Category has Books');
      }
      $this->deleteImage('/categories' . "/" . $category->image);
      $category->delete();
      return to_route('categories.index')->with('success', 'Category Deleted Successfully');
   }
}