<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SearchVendorEvent;
use App\Businesstype;
use App\Vendor;


class ClassifiedController extends Controller
{

    public function index()
    {
        $businessData = Businesstype::withCount('vendors')->orderBy('vendors_count','desc')->get();
        return view('classified.index',compact('businessData'));
    }

    public function searchvendor(Request $request)
    {

        $query = $request->query('query');


        $vendors = Vendor::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();


        event(new SearchVendorEvent($vendors));

        return response()->json("ok");
    }
    public function get(Request $request)
    {
        $query = $request->query('businesstype');
        if (empty($query)) {
            $query = '%';
        }
        $vendors = Vendor::where('businesstype_id','like',$query)
                     ->get();
        return response()->json($vendors);
    }

    public function btype(Request $request)
    {
        $query = $request->query('businesstype');
        $btype = Businesstype::find($query);

        return response()->json($btype);
    }

}
