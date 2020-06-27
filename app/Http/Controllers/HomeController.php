<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Vendor;
use App\Product;
use App\User;
use App\Notifications\UserFollowed;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = Vendor::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $products = Product::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $posts = Post::where('user_id', Auth::id())
        ->orderBy('published_at', 'desc')
        ->get();

        return view('members.home',compact('vendors','products','posts'));

    }
    public function profile($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        $vendors = Vendor::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        $products = Product::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $posts = Post::where('user_id', Auth::id())
        ->orderBy('published_at', 'desc')
        ->get();

        return view('members.profile',compact('user','vendors','products','posts'));

    }

    public function followUserRequest(Request $request){

        $user = User::find($request->user_id);
        $follower = auth()->user();
        if (auth()->user()->isFollowing($user)) {
            $response = auth()->user()->unfollow($user);

            return response()->json(['success'=>'unfollow']);
        }else {

            $response = auth()->user()->follow($user);
            $user->notify(new UserFollowed( $follower ));
            return response()->json(['success'=>'follow']);
        }


    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    // public function notify()
    // {
    //     $options = array(
    //                     'cluster' => env('PUSHER_APP_CLUSTER'),
    //                     'encrypted' => true
    //                     );
    //     $pusher = new Pusher(
    //                         env('PUSHER_APP_KEY'),
    //                         env('PUSHER_APP_SECRET'),
    //                         env('PUSHER_APP_ID'),
    //                         $options
    //                     );

    //     $data['message'] = 'hello investmentnovel';
    //     $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);

    // }
}
