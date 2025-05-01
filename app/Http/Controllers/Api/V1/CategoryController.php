<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = Category::paginate('10');
        return $this->apiResponse([
            'categories' => CategoryResource::collection($categories),
            "meta" => [
                "total" => $categories->total(),
                "per_page" => $categories->perPage(),
                "cuurent_page" => $categories->currentPage(),
                "last_page" => $categories->lastPage(),
            ],
            'links' => [
                "first" => $categories->url(1),
                "last" => $categories->url($categories->lastPage()),
                "prev" => $categories->previousPageUrl(),
                "next" => $categories->nextPageUrl(),
         ],   
        ],message:'Categories Returned Successfully');
    }
}
