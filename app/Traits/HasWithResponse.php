<?php

namespace App\Traits;

trait HasWithResponse
{
    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
        $response->header('Version', 'V1.0.0');
    }
}
