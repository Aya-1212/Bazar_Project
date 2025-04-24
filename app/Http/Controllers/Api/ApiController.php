<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
        public function apiResponse($data = [], $message = "", $error = [], $status = 200)
        {
            
            return response()->json([
                "data" => $data,
                "message" => $message,
                "error" => $error,
                "status" => $status,
            ])->setStatusCode($status);
        }
    }

