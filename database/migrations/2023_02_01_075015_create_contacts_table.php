<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Consts\ParamConst;

class CreateContactsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string(ParamConst::PARAM_FULLNAME, 255);
      $table->tinyInteger(ParamConst::PARAM_GENDER, false, true);
      $table->string(ParamConst::PARAM_EMAIL, 255);
      $table->string(ParamConst::PARAM_POSTCODE, 8);
      $table->string(ParamConst::PARAM_ADDRESS, 255);
      $table->string(ParamConst::PARAM_BUILDINGNAME, 255)->nullable();
      $table->text(ParamConst::PARAM_OPINION);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contacts');
  }
}
