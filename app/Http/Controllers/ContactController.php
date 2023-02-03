<?php

namespace App\Http\Controllers;

use App\Consts\RouteConst;
use Illuminate\Http\Request;
use App\Consts\ViewConst;
use App\Models\Contact;

class ContactController extends Controller
{
  use \App\Traits\GetRequest;

  // input page.
  public function index ()
  {
    return view(ViewConst::VIEW_CONTACT);
  }

  // modify input info.
  public function modify(Request $request)
  {
    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONTACT, $contact);
  }

  // confirm input info.
  public function confirm(Request $request)
  {
    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONFIRM, $contact);
  }

  // create contact to contacts table.
  public function create(Request $request)
  {
    $contact = $this->getRequestAll($request);
    Contact::createNewContact($contact);
    return redirect(RouteConst::ROUTE_CLOSE);
  }

  // show thanks page.
  public function close()
  {
    return view(ViewConst::VIEW_THANKS);
  }

  // contacts management page.
  public function manage()
  {
    $contacts = Contact::Paginate(5);
    return view(ViewConst::VIEW_MANAGEMENTS, $contacts);
  }
  
  // search contacts.
  public function search(Request $request)
  {
    $condition = $this->getRequestAll($request);
    $contacts = Contact::getContactsByCondition($condition);
    return view(ViewConst::VIEW_MANAGEMENTS, [$condition, $contacts]);
  }

  // delete contact from table.
  public function delete(Request $request)
  {
    Contact::deleteAtId($this->getIdFromRequest(($request)));
    return redirect(RouteConst::ROUTE_ROOT);
  }
}
