<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Swoole\WebSocket\Server;
class IndexController extends Controller
{

    public function index()
    {
        return view('Index/index');
    }
}