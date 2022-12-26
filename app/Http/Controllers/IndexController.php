<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class IndexController extends Controller
{
    /**
     * @return Response|ResponseFactory
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('Index/Index',
            [
                'message' => 'Hello from Laravel'
            ]
        );
    }

    /**
     * @return Response|ResponseFactory
     */
    public function show(): Response|ResponseFactory
    {
        return inertia('Index/Show');
    }
}
