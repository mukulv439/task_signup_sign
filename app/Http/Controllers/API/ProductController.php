<?php
       
namespace App\Http\Controllers\API;
       
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
       
class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $products = User::all();
        
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
}