<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesstype;

class ClassifiedController extends Controller
{
    // Show businesstype

    public function showbusinesstype()
    {
        $businesstype = Businesstype::where('active', 1)
        ->orderBy('name', 'desc')
        ->take(12)
        ->get();

        return view('classifield.index')->with('page', $businesstype);

    }
}
