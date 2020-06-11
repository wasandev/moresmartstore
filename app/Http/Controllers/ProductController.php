<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Vendor;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category  = Category::withCount(['products' => function ($query) {
            $query->where('status',1);
            }])
            ->where('active',1)
            ->orderBy('products_count','desc')->get();
        $q= $request->input('product-search');
        $products = Product::where('status',1)
                    ->whereHas('category',function ($query){
                        $query->where('active',1);
                    })
                    ->where( function($query) use($q) {
                        $query->where('name','LIKE','%'.$q.'%')
                              ->orWhere('description','LIKE','%'.$q.'%');
                    })
                    ->paginate(9);

        if(count($products) > 0)
            return view('products.index',compact('category','products'))->withQuery ( $q );
        else return view ('products.index',compact('category'))->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');

    }
    public function list(Request $request,$id)
    {

        $category  = Category::withCount(['products' => function ($query) {
            $query->where('status',1);
            }])
            ->where('active',1)
            ->orderBy('products_count','desc')->get();
        $categoryData = Category::find($id);
        $q = $request->input('product-search');

        $products = Product::where('category_id',$id)
                    ->where('status',1)
                    ->whereHas('category',function ($query){
                        $query->where('active',1);
                    })
                    ->paginate(9);

        if(count($products) > 0)
            return view('products.list',compact('category','categoryData','products'))->withQuery ( $q );
        else
            return view ('products.list',compact('category','categoryData'))->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');

    }
    public function show($id)
    {
        $product = Product::where('id',$id)->firstOrFail();
        $product->visits()->increment();

        $products = Product::where('category_id', $product->category->id)
                            ->where('id','<>',$id)
                            ->where('status',1)
                            ->whereHas('category',function ($query){
                                $query->where('active',1);
                            })
                            ->orderBy('created_at', 'desc')
                            //->take(4)
                            ->paginate(6);

        $productvendors = Product::where('vendor_id', $product->vendor->id)
                            ->where('id','<>',$id)
                            ->where('status',1)
                            ->whereHas('category',function ($query){
                                $query->where('active',1);
                            })
                            ->orderBy('created_at', 'desc')
                            //->take(8)
                            ->paginate(3);

        return view('products.show', compact('product','products','productvendors'));
    }


}
