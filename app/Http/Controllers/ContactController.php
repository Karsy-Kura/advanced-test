<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ParamConst;

class ContactController extends Controller
{
  //
  public function index ()
  {
    return view('index');
  }

  public function modify(Request $request)
  {
    $contact = $request->all();
    unset($form[ParamConst::PARAM_TOKEN]);
  }
}
