<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts\ViewConst;

class ContactController extends Controller
{
  use \App\Traits\GetRequest;
  //
  public function index ()
  {
    return view(ViewConst::VIEW_CONTACT);
  }

  public function modify(Request $request)
  {
    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONTACT, $contact);
  }

  public function confirm(Request $request)
  {
    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONFIRM, $contact);
  }


}
