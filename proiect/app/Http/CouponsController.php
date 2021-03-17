<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // folosim clasa Request pentru a lua date din 
        // url sau format 
        // Request $request == $request = Request 
        $coupon = Coupon::where('code', $request->coupon_code)
            //ia-mi datele din campul coupon_code care
            // este referinta catre formular 
            ->first();
        // folosind firtst ia doar prima valoare nu toatre
        //creaza un copul cu codul adaugat in formular

        if (!$coupon) {
            //daca nu exista nici un cupon
            // intoracete la home page(back)
            // fieaza eorare "invali... " folosind metoda withErrrorw
            return back()->withErrors('Invalid coupon code.
             Please try again.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        // daca adaugarea cuponului este un succces 
        // #1 redirectioneaza inapoi cu mesajul "success_message 
        return back()->with(
            'success_message',
            'Coupon has been applied!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with(
            'success_message',
            'Coupon has been removed.'
        );
    }
}
