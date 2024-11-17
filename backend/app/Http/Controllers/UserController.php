<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Validator;

class UserController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return response()->json([
                'success'   => false,
                'message'   => 'Unauthorized'
            ], 401);
        }

        $user = User::oldest->get();

        return response()->json([
            'success' => true,
            'message' => 'List User',
            'data'    => $user
        ], 200);
    }
}
