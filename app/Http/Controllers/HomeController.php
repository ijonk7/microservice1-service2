<?php

namespace App\Http\Controllers;

use App\Models\ListNumber;
use Illuminate\Support\Facades\Http;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://microservice1-service3.test/api/customers')->json();

        return view('home', [
            'data' => $response['data']
        ]);
    }

    public function receiveRabbitMQ()
    {
        $list_number = ListNumber::orderBy('created_at', 'desc')->get();

        return view('receive-rabbitmq', [
            'data' => $list_number
        ]);
    }
}
