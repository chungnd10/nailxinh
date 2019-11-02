<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function introduction()
    {
        return view('client.introduction');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function services()
    {
        return view('client.services');
    }

    public function booking()
    {
        return view('client.booking');
    }

    public function gallery()
    {
        return view('client.gallery');
    }
}
