@extends('layouts.common')

@section('title', 'お問い合わせ')
@section('css', 'contact.css')

@section('header')
<h1 class="common-header__title">お問い合わせ</h1>
@endsection

@section('content')
<div class="contact">
  <div class="contact__inner-wrap">
    <form action="/contact/create" method="post">
      @csrf
      <!-- 名前 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_FULLNAME}}" class="common-label">
            お名前
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_FAMILYNAME]}}
          </span>
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_FIRSTNAME]}}
          </span>
          <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_FAMILYNAME}}" value="{{$contact[\App\Consts\ParamConst::PARAM_FAMILYNAME]}}">
          <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_FIRSTNAME}}" value="{{$contact[\App\Consts\ParamConst::PARAM_FIRSTNAME]}}">
        </div>
      </div>
      <!-- 性別 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_GENDER}}" class="common-label">
            性別
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            @if ($contact[\App\Consts\ParamConst::PARAM_GENDER] == 1)
            男性
            @elseif ($contact[\App\Consts\ParamConst::PARAM_GENDER] == 2)
            女性
            @endif
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value="{{$contact[\App\Consts\ParamConst::PARAM_GENDER]}}">
      </div>
      <!-- メールアドレス -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_EMAIL}}" class="common-label">
            メールアドレス
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_EMAIL]}}
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_EMAIL}}" value="{{$contact[\App\Consts\ParamConst::PARAM_EMAIL]}}">
      </div>
      <!-- 郵便番号 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_POSTCODE}}" class="common-label">
            郵便番号
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_EMAIL]}}
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_POSTCODE}}" value="{{$contact[\App\Consts\ParamConst::PARAM_POSTCODE]}}">
      </div>
      <!-- 住所 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_ADDRESS}}" class="common-label">
            住所
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_ADDRESS]}}
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_ADDRESS}}" value="{{$contact[\App\Consts\ParamConst::PARAM_ADDRESS]}}">
      </div>
      <!-- 建物名 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_BUILDINGNAME}}" class="common-label">
            建物名
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_BUILDINGNAME]}}
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_BUILDINGNAME}}" value="{{$contact[\App\Consts\ParamConst::PARAM_BUILDINGNAME]}}">
      </div>
      <!-- ご意見 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_OPINION}}" class="common-label">
            ご意見
          </label>
        </div>
        <div class="contact__form-elem__right">
          <span class="common-confirm">
            {{$contact[\App\Consts\ParamConst::PARAM_OPINION]}}
          </span>
        </div>
        <input type="hidden" name="{{\App\Consts\ParamConst::PARAM_OPINION}}" value="{{$contact[\App\Consts\ParamConst::PARAM_OPINION]}}">
      </div>
      <!-- ボタン -->
      <div class="common-button">
        <button class="common-button wd-15">送信</button>
        <button class="common-button__back" name="back" value="back">修正する</button>
      </div>
    </form>
  </div>
</div>
@endsection