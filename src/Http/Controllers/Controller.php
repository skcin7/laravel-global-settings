<?php

namespace Skcin7\LaravelGlobalSettings\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Respond to a request with JSON, using a consistent format throughout the app.
     *
     * @param mixed $resource = null
     * @param string $message = ''
     * @param int $status_code = 200
     * @return JsonResponse
     */
    public function respondWithJson(mixed $resource = null, string $message = '', int $status_code = 200): JsonResponse
    {
        $data = [];

        // Attach the resource data (if any exists):
        if(! is_null($resource)) {
            $data['resource'] = $resource;
        }

        // Attach the message:
        $data['message'] = $message;

        // Attach the status code and status text:
        $data['status_code'] = $status_code;
        $data['status_text'] = Response::$statusTexts[$status_code];

        // Respond to the API request:
        return response()->json($data, $status_code);
    }
}
