<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    /**
     * Auths the user with given credentials.
     *
     * @param LoginFormRequest $request
     *
     * @return LoginResource|JsonResponse
     */
    public function authenticate(LoginFormRequest $request)
    {
        if (Auth::once(array('email' => $request->input('email'),
                            'password'=> $request->input('password')))) {
            return new LoginResource(Auth::user());
        }

        return Response::json(['error' => true]);
    }
}
