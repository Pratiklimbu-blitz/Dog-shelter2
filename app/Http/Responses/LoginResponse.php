<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request): RedirectResponse|Response
    {
        $user = auth()->user();
        $route = $user->isAdmin() ? route('dashboard.index') : route('front.index');
        return redirect()->intended($route);
    }
}
