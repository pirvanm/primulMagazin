<?php

function presentPrice($price)
{
    //afiseaza pretul format cu doua zecimale ,avand
    // $ ca si metoda monetara 
    return '$' . number_format($price / 100, 2);
}

function setActiveCategory($category, $output = 'active')
{
    //seteaza categorie implicita "luand datele " din 
    // request 
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    // afiseaza calea daca fisierul exista in folderul /storage
    // altfel creaza fisierdul in folderul 
    //storage 
    //daca nu exista, creeaza aici in storage () 
    //? = if 
    //:  = else //
    return $path && file_exists('storage/' . $path)
        ? asset('storage/' . $path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    // preia valoare VAT(TVA) din constanta tax ce se afla
    // in folderul config iar in folderul condif din fisierul
    //cart.php 
    $discount = session()->get('coupon')['discount'] ?? 0;
    // preia valoarea discountului din sesiune 
    $code = session()->get('coupon')['name'] ?? null;
    //preia valoarea cuponului din sesiune 

    //calculeaza noul subtotal 
    //din diferenta subtotal - discount
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    //daca subtolul este negativ 
    // se atribuie valoarea  0 
    $newTax = $newSubtotal * $tax;
    //calculeaza noua taxa 
    $newTotal = $newSubtotal * (1 + $tax);

    /// returneaza un obiect de tablouri 
    // folosesc metoda collect

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}
