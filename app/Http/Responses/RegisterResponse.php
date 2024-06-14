<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Symfony\Component\HttpFoundation\Response;

class RegisterResponse implements RegisterResponseContract {

    public function toResponse($request): RedirectResponse|Response
    {
        $user = auth()->user();
        $route = $user->isAdmin() ? route('dashboard.index') : route('front.index');
        return redirect()->intended($route);
    }
}
