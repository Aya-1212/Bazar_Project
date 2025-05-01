<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends ApiController
{
  public function index(){
      $publishers = Publisher::paginate(10);
      return $this->apiResponse([
        'publishers' => PublisherResource::collection( $publishers ),
        "meta" => [
                    "total" => $publishers->total(),
                    "per_page" => $publishers->perPage(),
                    "current_page" => $publishers->currentPage(),
                    "last_page" => $publishers->lastPage(),
                ],
                "links" => [
                    "first" => $publishers->url(1),
                    "last" => $publishers->url($publishers->lastPage()),
                    "prev" => $publishers->previousPageUrl(),
                    "next" => $publishers->nextPageUrl(),
                ],
        
     ]
   , message:"Publishers Returned Successfully"
    );
     
  }
}
