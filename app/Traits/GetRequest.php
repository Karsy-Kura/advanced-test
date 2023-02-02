<?php

namespace App\Traits;

use App\Consts\ParamConst;
use Illuminate\Http\Request;

trait GetRequest
{
  private function unsetTokenFromArray($array)
  {
    unset($array[ParamConst::PARAM_TOKEN]);
    return $array;
  }

  private function getRequestAll(Request $request)
  {
    return $this->unsetTokenFromArray($request->all());
  }

  private function getRequestQuery(Request $request)
  {
    return $this->unsetTokenFromArray($request->query());
  }
}
