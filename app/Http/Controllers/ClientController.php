<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $aut= Auth::user()->id;
        $clients = Client::where('user_id',$aut)->get();
        // $client = Client::all();
        return view('client',compact('clients'));
    }

    public function store(){
        
    }
}
