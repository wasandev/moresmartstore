<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->get();

        return view('vendors.index',compact('vendors'));

    }
    public function show($id)
    {
        $vendors = Vendor::where('id',$id)->firstOrFail();
        $vendors->visits()->increment();

        return view('vendors.show', compact('vendors'));
    }

    public function get(Request $request)
    {
        $query = $request->query('query');
        $vendors = Vendor::where('id', $query)
            ->get();
        return response()->json($vendors);
    }
}
