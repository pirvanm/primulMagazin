<?php

namespace App\Http\Controllers;
// Include o clasa definit ca si model
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrimulMeuController extends Controller
{
    public function index()
    {
        dd('sunt in metoda');
        return 'metoda din controler';
    }

    public function getData()
    {
        //  dd('metoda get data');
        // $email = DB::table('users')
        //     ->first();

        $users = DB::table('users')
            ->get();

        // First() este o metoda care ia doar o intreare , ultima 
        // get() ia toate datele din baza de date 

        return $users;
        dd($email);
        // ->where('name', 'John')
        //->value('email');
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
