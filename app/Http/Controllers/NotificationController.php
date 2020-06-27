<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Pusher\Pusher;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function notify()
    {
        $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'encrypted' => true
                        );
        $pusher = new Pusher(
                            env('PUSHER_APP_KEY'),
                            env('PUSHER_APP_SECRET'),
                            env('PUSHER_APP_ID'),
                            $options
                        );

        $data['message'] = 'hello investmentnovel';
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);

    }
}
