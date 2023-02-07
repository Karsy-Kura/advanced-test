<?php

namespace App\Http\Controllers;

use App\Consts\RouteConst;
use Illuminate\Http\Request;
use App\Consts\ViewConst;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
  use \App\Traits\GetRequest;

  // input page.
  public function index ()
  {
    $contact = new Contact();
    $param = [
      'contact' => $contact
    ];
    return view(ViewConst::VIEW_CONTACT,  $param);
  }

  // modify input info.
  public function modify(ContactRequest $request)
  {
    $request->validate();

    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONTACT, ['contact' => $contact]);
  }

  // confirm input info.
  public function confirm(ContactRequest $request)
  {
    $contact = $this->getRequestAll($request);
    return view(ViewConst::VIEW_CONFIRM, ['contact' => $contact]);
  }

  // create contact to contacts table.
  public function create(ContactRequest $request)
  {
    $contact = $this->getRequestAll($request);
    if ($request->input('back') == 'back'){
      return $this->modify($request);
    }

    Contact::createNewContact($contact);
    return redirect(RouteConst::ROUTE_CONTACT . "/" . RouteConst::ROUTE_CLOSE);
  }

  // show thanks page.
  public function close()
  {
    return view(ViewConst::VIEW_THANKS);
  }

  // contacts management page.
  public function manage()
  {
    $contacts = Contact::getContacts();
    $param = [
      'contacts' => $contacts,
    ];
    return view(ViewConst::VIEW_MANAGEMENT, $param);
  }
  
  // search contacts.
  public function search(Request $request)
  {
    $condition = $this->getRequestQuery($request);
    $contacts = Contact::getContactsByCondition($condition);
    $param = [
      'contacts' => $contacts
    ];
    return view(ViewConst::VIEW_MANAGEMENT, $param);
  }

  // delete contact from table.
  public function delete(Request $request)
  {
    Contact::deleteAtId($this->getIdFromRequest(($request)));
    return redirect(RouteConst::ROUTE_CONTACT . "/" . RouteConst::ROUTE_MANAGEMENT);
  }
}
