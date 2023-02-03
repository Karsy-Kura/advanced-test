<?php

namespace App\Models;

use App\Consts\ParamConst;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

class Contact extends Model
{
  use HasFactory;

  protected $guarded = [ ParamConst::PARAM_ID ];

  const PAGINATE_NUM = 5;

  public static function getContacts()
  {
    return Contact::Paginate(self::PAGINATE_NUM);
  }

  public static function createNewContact($array)
  {
    self::create($array);
    return;
  }

  public static function getContactsByCondition($array)
  {
    $condition = array();
    $condition_created_at = array();

    // create condition.
    foreach ($array as $key => $value)
    {
      switch ($key)
      {
        // like.
        case ParamConst::PARAM_FULLNAME:
        case ParamConst::PARAM_EMAIL:
          $condition[] = [$key, 'LIKE', '%' + $value + '%'];
          break;

        // equal. 
        case ParamConst::PARAM_GENDER:
          $condition[] = [$key, '=', $value];
          break;

        // between.
        case ParamConst::PARAM_FROM:
        case ParamConst::PARAM_TO:
          $cond = [$key => $value];
          $condition_created_at = array_merge($condition_created_at, $cond);
          break;

        default:
          Log::warning('At '+ __FUNCTION__ + ', Invalid Key : ' + $key);
          break;
      }
    }

    // search Contacts by Condition.
    $isEmptyCondition = empty($condition);
    $isEmptyConditionCreatedAt = empty($condition_created_at);

    if ($isEmptyCondition && $isEmptyConditionCreatedAt)
    {
      return self::getContacts();
    }
    
    $contacts = null;
    if (!$isEmptyConditionCreatedAt)
    {
      $from = $condition_created_at[ParamConst::PARAM_FROM] ?? Carbon::minValue();
      $to = $condition_created_at[ParamConst::PARAM_TO] ?? Carbon::maxValue();
      $contacts = self::whereBetween(ParamConst::PARAM_CREATEDAT, [$from, $to])->get();
    }

    if (!$isEmptyCondition)
    {
      if (isNull($contacts))
      {
        $contacts = self::where($condition)->get();
      }
      else {
        $contacts = $contacts::where($condition)->get();
      }
    }

    assert(!isNull($contacts));
    return $contacts->Paginate(self::PAGINATE_NUM);
  }
}
