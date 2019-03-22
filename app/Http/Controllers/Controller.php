<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Redirect back to the message with some message
     *
     * @param  string  $type
     * @param  string  $text
     *
     * @return Response
     */
    protected function redirectBackWithMessage(string $type, string $text): Response
    {
        return redirect()->back()->with(['message' => ['type' => $type, 'text' => $text]]);
    }
}
