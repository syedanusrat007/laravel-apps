<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        $pusher = new Pusher('08191801e5f62b42355d', '9de1b79820c4ddb9c2d0', '703934', [
            'cluster' => 'ap2',
            'encrypted' => true
        ]);
        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);
        return response($key);
    }
}
