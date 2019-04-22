<?php

namespace App\Http\Controllers;

class IamportTestController extends Controller
{
    public function index()
    {
        $iamport = [
            'title'         => 'Iamport',
            'description'   => 'loremLorem ipsum dolor sit amet, consectetur adipisicing elit.',
        ];

        return view('iamport.index', compact('iamport'));
    }

    public function store()
    {
        dd('strore method called');
    }
}
