<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormStoreRequest;
use App\Http\Requests\UserFormUpdateRequest;
use App\Http\Resources\SuccessJSONResponseResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormStoreRequest $request
     *
     * @return SuccessJSONResponseResource
     */
    public function store(UserFormStoreRequest $request): SuccessJSONResponseResource
    {
        $attributes              = $request->all();
        $attributes['api_token'] = Str::random(60);
        $attributes['password']  = Hash::make($request->get('password'));
        User::create($attributes);

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $model
     * @return UserResource
     */
    public function show(User $model): UserResource
    {
        return new UserResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $model
     * @param UserFormUpdateRequest $request
     * @return SuccessJSONResponseResource
     */
    public function update(UserFormUpdateRequest $request, User $model): SuccessJSONResponseResource
    {
        $model -> update($request -> all());

        return new SuccessJSONResponseResource(null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $model
     * @return SuccessJSONResponseResource
     *
     * @throws Exception|Throwable
     */
    public function destroy(User $model): SuccessJSONResponseResource
    {
        $model -> delete();

        return new SuccessJSONResponseResource(null);
    }
}
