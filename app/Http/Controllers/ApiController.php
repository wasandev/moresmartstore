<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesstype ;

class ApiController extends Controller
{
    public function BusinesstypeData()
    {
        $rows = Businesstype::where('active', 1)
        ->orderBy('name', 'desc')
        ->get();
        return response()->json($rows);

    }
}
