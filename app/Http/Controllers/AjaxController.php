<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AjaxController extends Controller
{
    public function index(Request $request) {
        $email = $request->input('email');
        if (User::where('email', $email)->first()) {
            $taken = True;
        } else {
            $taken = False;
        }
        return response()->json(array('taken'=> $taken), 200);
     }
}
