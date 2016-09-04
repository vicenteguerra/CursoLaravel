<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;

use App\Http\Requests;

class UploadController extends Controller
{
    public function upload(){

      $file = array('image' => Input::file('imagen'));
      $rules = array('image' => ["required", "mimes:jpeg,bmp,png"]);
      $validator = Validator::make($file, $rules);
      if($validator->fails()){
        Session::flash('error', "Tipo invalido");
        return Redirect::to('home')->withInput()->withErrors($validator);
      }else{
        if(Input::file('imagen')->isValid()){
          $destinationPath = "uploads"; // Full path to upload image
          $extension = Input::file('imagen')->getClientOriginalExtension();
          $fileName = rand(0,999999) . "." . $extension;
          Input::file('imagen')->move($destinationPath, $fileName);
          Session::flash('success', "La imagen se subio correctamente");
          return Redirect::to('home');
        }else{
          Session::flash('error', "Ocurrio un error");
          return Redirect::to('home');
        }
      }


    }
}
