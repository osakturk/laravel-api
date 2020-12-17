<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormStoreRequest;
use App\Http\Requests\ProductFormUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SuccessJSONResponseResource;
use App\Models\Product;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductFormStoreRequest $request
     *
     * @return SuccessJSONResponseResource
     */
    public function store(ProductFormStoreRequest $request): SuccessJSONResponseResource
    {
        Product::create($request->all());

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $model
     * @return ProductResource
     */
    public function show(Product $model): ProductResource
    {
        return new ProductResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product $model
     * @param ProductFormUpdateRequest $request
     * @return SuccessJSONResponseResource
     */
    public function update(ProductFormUpdateRequest $request, Product $model): SuccessJSONResponseResource
    {
        $model -> update($request->all());

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $model
     * @return SuccessJSONResponseResource
     *
     * @throws Exception|Throwable
     */
    public function destroy(Product $model): SuccessJSONResponseResource
    {
        $model -> delete();

        return new SuccessJSONResponseResource(null);
    }
}
