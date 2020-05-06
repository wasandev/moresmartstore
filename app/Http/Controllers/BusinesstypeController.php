<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesstype;

class BusinesstypeController extends Controller
{
    public function show()
    {

    $businesstype = Businesstype::where('active', 1)
    ->orderBy('name', 'desc')
    ->take(12)
    ->get();

    return view('businesstype.show')->with('page', $businesstype);
    }
}
