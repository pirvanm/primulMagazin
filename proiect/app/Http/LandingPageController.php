<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{

    public function raw()
    {
        //Cod cod pentru interpretarea "cereri de tip sql" 
        $users = DB::select(
            'select * from users where id = ?',
            [1]
        );

        // in folderul /user care se afla in resource/views
        // in fisierul index.blade.php 
        //"trimite" un tablou "users" cu valorile din 
        //variabila  $users 
        return view(
            'user.index',
            ['usersa' => $users]
        );
        //facem for each in view 
        // pe usersa 
    }

    public function joinsTables()
    {
        // tabela users 
        // alaturata prin join de tabele contacts
        #exemplu compus
        $join =  DB::table('users')
            ->join('contacts', function ($join) {
                $join
                    ->on(
                        'users.id',
                        '=',
                        'contacts.users_id'
                    )
                    ->where('contacts.type', 'donor');
            })
            //get() i-ami dotate datele din obiectul
            //colectia de mai sus 
            ->get();
        // #exemplu pe mai multe variabile
        //$join ->get()

        $joinSimplu =  DB::table('users');
        $w->where('contacts.type', 'donor');

        $joinSimplu->join('contacts', function ($join) {
            $join
                ->on(
                    'users.id',
                    '=',
                    'contacts.users_id'
                )
                ->$w;
        })->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insert()
    {
        DB::table('users')
            //metoda ::table pentru a spune unde
            // adaugam
            ->insert([
                ['email' =>
                'taylor@example.com', 'votes' => 0],

                ['email' => 'dayle@example.com', 'votes' => 0]
            ]);
        // metoda insert()
        // pentru a spune ce facem
    }

    public function userById()
    {
        $type = 1;
        $usersOfType = DB::table('users')

            //unde coloana type este egala cu 
            // valoarea variabile $type;
            ->where('type', $type)
            ->get();
    }

    public function update()
    {
        $affected = DB::table('users')
            ->where('id', 1)
            //->where('name', '=', 1)
            // ->where('id', '>',1)
            // actualizeaza intrarea din coloane 
            //voutes unde id = 1 

            ->update(['votes' => 1]);

        dd($affected);
    }




    public function index()
    {


        //Non Fluent
        // Metoda care folosese array-uri tablouri
        $users = DB::select(
            [
                'table' => 'user',
                'where' =>
                ['type' => 'donor']
            ]
        );
        // select pentru a fi aseamantor cu mysql    
        //Fluent
        //table() este varianta moderna a mysql
        // Foloseste metode, mai "oop" spre deosebire
        // celaltat exemplu
        $users = DB::table('users')
            ->where(
                'type',
                'donor'
            )
            ->get();


        //date din baza de date
        $products = Product::where('featured', true)
            // Ia-mi toate produse care au foloana featured = true
            //doar 8 produser
            ->take(8)
            //in ordine aletoare
            ->inRandomOrder()->get();

        // array trimis in view 
        return view('landing-page')
            // trimite toate produsele
            ->with('products', $products);
    }
}
