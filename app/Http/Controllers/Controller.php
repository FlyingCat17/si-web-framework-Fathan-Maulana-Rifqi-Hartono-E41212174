<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function redirectWithSuccess($route, $message)
    {
        return redirect()->route($route)->with('flash', [
            'type' => 'success',
            'message' => $message
        ]);
    }
    
    public function redirectWithDanger($route, $message)
    {
        return redirect()->route($route)->with('flash', [
            'type' => 'danger',
            'message' => $message
        ]);
    }
}
