<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormStoreRequest;
use App\Http\Requests\OrderFormUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\SuccessJSONResponseResource;
use App\Models\Order;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderFormStoreRequest $request
     * @return SuccessJSONResponseResource
     */
    public function store(OrderFormStoreRequest $request): SuccessJSONResponseResource
    {
        Order::create($request->all());

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Display the specified resource.
     *
     * @param  Order  $model
     * @return OrderResource
     */
    public function show(Order $model ): OrderResource
    {
        return new OrderResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Order $model
     * @param OrderFormUpdateRequest $request
     * @return SuccessJSONResponseResource
     */
    public function update(Order $model, OrderFormUpdateRequest $request): SuccessJSONResponseResource
    {
        $model-> update($request->all());

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order  $model
     * @return SuccessJSONResponseResource
     *
     * @throws Exception|Throwable
     */
    public function destroy(Order $model): SuccessJSONResponseResource
    {
        $model -> delete();

        return new SuccessJSONResponseResource(null);
    }
}
