<?php

namespace Ocus\LaravelLaunchDarkly\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JsonException;
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LaunchDarklyMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $key
     * @param string $value
     *
     * @return mixed
     *
     * @throws AccessDeniedHttpException
     * @throws JsonException
     */
    public function handle(Request $request, Closure $next, string $key, string $value): mixed
    {
        $user = Auth::user();
        $decodedValue  = json_decode($value, true, 512, JSON_THROW_ON_ERROR);

        if ($decodedValue === null) {
            $decodedValue = $value;
        }

        if (!$user || LaunchDarkly::variation($key, $user->launch_darkly_user) !== $decodedValue) {
            throw new AccessDeniedHttpException('This feature is not enabled for your account');
        }

        return $next($request);
    }
}
