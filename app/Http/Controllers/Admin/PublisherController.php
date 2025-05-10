<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\AddPublisherRequest;
use App\Http\Requests\Publisher\EditPublisherRequest;
use App\Http\Traits\FileSystem;
use App\Models\Book;
use Exception;
use App\Models\Publisher;


class PublisherController extends Controller
{
    use FileSystem;
    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('admin.pages.publishers.index', compact('publishers'));
    }

    public function show(Publisher $publisher){
        try{
            $publisher = Publisher::findOrFail($publisher->id);
            return view('admin.pages.publishers.show',compact('publisher'));
        }catch(Exception $e){
        return to_route('publishers.index')->with('errors', 'No Such Publisher');
        }
    }


    public function add()
    {
        return view('admin.pages.publishers.add');
    }
    public function store(AddPublisherRequest $request)
    {
        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->phone = $request->phone;
        $publisher->email = $request->email;
        $publisher->save();

        return to_route('publishers.index')->with('success', 'Publisher Added Successfully');
    }
    public function destroy(Publisher $publisher)
    {
        $has_books = Book::where('publisher_id', $publisher->id)->exists();
        if ($has_books) {
            return to_route('publishers.index')->with('error', 'This Publisher has Books');
        }
        $publisher->delete();
        return to_route('publishers.index')->with('success', 'Publisher Deleted Successfully');
    }
    public function edit(Publisher $publisher)
    {
        try {
            $publisher = Publisher::findOrFail($publisher->id);
            return view('admin.pages.publishers.edit', compact('publisher'));
        } catch (Exception $e) {
            return response()->back()->with('errors', 'No such Publisher');
        }

    }
    public function update(EditPublisherRequest $request, Publisher $publisher)
    {
        $publisher = Publisher::where('id', $publisher->id)->first();
        if ($publisher) {
            $publisher->name = $request->name;
            $publisher->phone = $request->phone;
            $publisher->email = $request->email;
            $publisher->save();
            return to_route('publishers.index')->with('success', 'Publisher Updated Successfully');
        }
        return to_route('publishers.index')->with('error', 'No such Publisher');
    }

}
