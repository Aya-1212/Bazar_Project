<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;


class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('admin.pages.publishers.index', compact('publishers'));
    }
    
    public function edit(Publisher $publisher)
    {
        return view('admin.pages.publishers.edit');
    }
    
       public function add(){
        return view('admin.pages.publishers.add');
       }
       public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.pages.publishers.index')->with('success', 'Publisher deleted successfully.');
    }
}
