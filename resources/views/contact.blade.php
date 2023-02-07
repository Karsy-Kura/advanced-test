@extends('layouts.common')

@section('title', 'お問い合わせ')
@section('css', 'contact.css')

@section('header')
<h1 class="common-header__title">お問い合わせ</h1>
@endsection

@section('content')
<div class="contact">
  <div class="contact__inner-wrap">
    @if (count($errors) > 0)
    <p>入力に問題があります</p>
    @endif
    <form action="/contact/confirm" method="post">
      @csrf
      <!-- 名前 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_FULLNAME}}" class="common-label-required">
            お名前
          </label>
        </div>
        <div class="contact__form-elem__right">
          <div class="contact__form-elem__has-example-div2">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_FAMILYNAME}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_FAMILYNAME]}}" @endif>
            <p class="example-text">例）山田</p>
            @error(\App\Consts\ParamConst::PARAM_FAMILYNAME)
            <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          <div class="contact__form-elem__has-example-div2">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_FIRSTNAME}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_FIRSTNAME]}}" @endif>
            <p class="example-text">例）太郎</p>
            @error(\App\Consts\ParamConst::PARAM_FIRSTNAME)
            <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
      </div>
      <!-- 性別 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_GENDER}}" class="common-label-required">
            性別
          </label>
        </div>
        <div class="contact__form-elem__right">
          <div class="common-radio">
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=1 @if($contact[\App\Consts\ParamConst::PARAM_GENDER] !=2) checked @endif>
            <label>男性</label>
          </div>
          <div class="common-radio">
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=2 @if($contact[\App\Consts\ParamConst::PARAM_GENDER]==2) checked @endif>
            <label>女性</label>
          </div>
          @error(\App\Consts\ParamConst::PARAM_GENDER)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- メールアドレス -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_EMAIL}}" class="common-label-required">
            メールアドレス
          </label>
        </div>
        <div class="contact__form-elem__right">
          <div class="contact__form-elem__has-example">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_EMAIL}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_EMAIL]}}" @endif>
            <p class="example-text">例）test@example.com</p>
          </div>
          @error(\App\Consts\ParamConst::PARAM_EMAIL)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- 郵便番号 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_POSTCODE}}" class="common-label-required">
            郵便番号
          </label>
        </div>
        <div class="contact__form-elem__right">
          <!-- TODO: 郵便マーク -->
          <div class="contact__form-elem__has-example">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_POSTCODE}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_POSTCODE]}}" @endif>
            <p class="example-text">例）123-4567</p>
          </div>
          @error(\App\Consts\ParamConst::PARAM_POSTCODE)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- 住所 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_ADDRESS}}" class="common-label-required">
            住所
          </label>
        </div>
        <div class="contact__form-elem__right">
          <div class="contact__form-elem__has-example">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_ADDRESS}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_ADDRESS]}}" @endif>
            <p class="example-text">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
          @error(\App\Consts\ParamConst::PARAM_ADDRESS)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- 建物名 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_BUILDINGNAME}}" class="common-label">
            建物名
          </label>
        </div>
        <div class="contact__form-elem__right">
          <div class="contact__form-elem__has-example">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_BUILDINGNAME}}" class="common-input" @if ($contact!=null) value="{{$contact[\App\Consts\ParamConst::PARAM_BUILDINGNAME]}}" @endif>
            <p class="example-text">例）千駄ヶ谷マンション101</p>
          </div>
          @error(\App\Consts\ParamConst::PARAM_BUILDINGNAME)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- ご意見 -->
      <div class="common-form-elem">
        <div class="contact__form-elem__left">
          <label for="{{\App\Consts\ParamConst::PARAM_OPINION}}" class="common-label-required">
            ご意見
          </label>
        </div>
        <div class="contact__form-elem__right">
          <textarea class="common-input contact__form__opinion" name="{{\App\Consts\ParamConst::PARAM_OPINION}}" rows="5">@if($contact!=null){{$contact[\App\Consts\ParamConst::PARAM_OPINION]}}@endif</textarea>
          @error(\App\Consts\ParamConst::PARAM_OPINION)
          <p class="error-message">{{$message}}</p>
          @enderror
        </div>
      </div>
      <!-- ボタン -->
      <div class="common-button">
        <button class="common-button wd-15">確認</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script', 'contact.js')