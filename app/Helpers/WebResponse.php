<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;

class WebResponse
{
    public static function success(string $message, string $route, array $params = []): RedirectResponse {
        return redirect()
            ->route($route, $params)
            ->with('success', $message);
    }

    public static function error(string $message): RedirectResponse
    {
        return back()
            ->withInput()
            ->with('error', $message);
    }
}
