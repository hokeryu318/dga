<?php

namespace App\Http\Controllers\Auth;

use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController;

class CustomAccessTokenController extends AccessTokenController
{
    /**
     * Hooks in before the AccessTokenController issues a token
     *
     *
     * @param  ServerRequestInterface $request
     * @return mixed
     */
    public function issueUserToken(ServerRequestInterface $request)
    {
        $httpRequest = request();

        // 1.
        if ($httpRequest->grant_type == 'password') {
            // 2.
            $user = \App\User::where('email', $httpRequest->username)->first();
            return $user;

            // Perform your validation here

            // If the validation is successfull:
            return $this->issueToken($request);
        }
    }
}