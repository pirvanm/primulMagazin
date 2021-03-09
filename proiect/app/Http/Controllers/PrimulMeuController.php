<?php

namespace App\Http\Controllers;
// Include o clasa definit ca si model
use App\User;
use Illuminate\Http\Request;

class PrimulMeuController extends Controller
{
    public function index()
    {
        return 'metoda din controler';
    }

    public function getUser()
    {
        $user = new User();
        // dd == var_dump
        // dd($user);

        return $user;
    }
}
