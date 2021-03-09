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

    public function getHTML()
    {
        // metoda care care incarca view-ul , sea  fla in folderul
        // resources /view / folderul create de mine
        // resources/view/ user / fisierul pus la final
        // reroueces /view /user/index.blade.php 
        return view('user.index');
    }

    public function getUser()
    {
        $user = new User();
        // dd == var_dump
        // dd($user);

        return $user;
    }
}
