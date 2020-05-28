<?php

use App\Blog;
use Illuminate\Support\Facades\Route;




//Auth::routes(['verify' => true]);
Auth::routes();
//Welcome page : /
Route::get('/','MstoreController@index');

//Memeber page : /
Route::get('/home','HomeController@index');
//Pages
Route::get('pages/{slug}', array('as' => 'page.show', 'uses' => 'PagesController@show'));

//Posts
Route::get('/post','PostController@index');
Route::get('/post/{slug}', 'PostController@show');
//Blogs
Route::any('/blog', 'BlogController@index');

// Route::any('/blogsearch',function(){
//     $q = Input::get( 'blog_search' );
//     $blog = Blog::where('title','LIKE','%'.$q.'%')->orWhere('blog_content','LIKE','%'.$q.'%')->get();
//     if(count($blog) > 0)
//         return view('blogs.index')->withDetails($blog)->withQuery ( $q );
//     else return view ('blogs.index')->withMessage('ไม่พบเนื้อหาที่ต้องการ ลองค้นหาใหม่!');
// });

Route::get('/blog/{slug}', 'BlogController@show');
//Classified - businesstype
//Route::get('/classified', 'ClassifiedController@index');

//Products
Route::get('/product/', function () {
    return view('products.index');
});



//Route::get('/product/{any?}', 'ProductController@index')->where('any', '.*');


Route::get('/classified/{any?}', 'ClassifiedController@index')->where('any', '.*');


//Route::get('/api/businesstype-data','ApiController@BusinesstypeData');
