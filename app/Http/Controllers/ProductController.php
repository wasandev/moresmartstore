<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index(Request $request)
    {
        $category  = Category::withCount(['products' => function ($query) {
            $query->where('status', 1)
                ->whereHas('vendor', function ($query) {
                    $query->where('status', 1);
                });
        }])
            ->where('active', 1)
            ->orderBy('products_count', 'desc')->get();
        $q = $request->input('product-search');
        $products = Product::where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->whereHas('vendor', function ($query) {
                $query->where('status', 1);
            })
            ->where(function ($query) use ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%')
                    ->orWhere('description', 'LIKE', '%' . $q . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        if (count($products) > 0)
            return view('products.index', compact('category', 'products'))->withQuery($q);
        else return view('products.index', compact('category'))->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');
    }
    public function list(Request $request, $id)
    {

        $category  = Category::withCount(['products' => function ($query) {
            $query->where('status', 1)
                ->whereHas('vendor', function ($query) {
                    $query->where('status', 1);
                });
        }])
            ->where('active', 1)
            ->orderBy('products_count', 'desc')->get();
        $categoryData = Category::find($id);
        $q = $request->input('product-search');

        $products = Product::where('category_id', $id)
            ->where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->whereHas('vendor', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        if (count($products) > 0)
            return view('products.list', compact('category', 'categoryData', 'products'))->withQuery($q);
        else
            return view('products.list', compact('category', 'categoryData'))->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product->visits()->seconds(30)->increment(1, false, ['country', 'language']);

        $products = Product::where('category_id', $product->category->id)
            ->where('id', '<>', $id)
            ->where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->whereHas('vendor', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        $productvendors = Product::where('vendor_id', $product->vendor->id)
            ->where('id', '<>', $id)
            ->where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8);


        return view('products.show', [
            'product' => $product,
            'products' => $products,
            'productvendors' => $productvendors,
            'open_graph' => [
                'title' => $product->name,
                'image' => url(Storage::url($product->image)),
                'url' => $this->request->url(),
                'description' => Str::of($product->description)->limit(150)
            ]
        ]);
    }
}
