<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return json_encode($users);
        $json = Array("Name" => "Santiago",
                      "Edad" => 19,
                      "Ciudad" => "CDMX",
                      "Color" => "azul");
        return json_encode($json);
        return view('home');
    }
}
