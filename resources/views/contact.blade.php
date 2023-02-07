@extends('layouts.common')

@section('title', 'お問い合わせ')
@section('css', 'contact.css')

@section('header')
<h1 class="common-header__title">お問い合わせ</h1>
@endsection

@section('content')
<div class="contact">
  <div class="contact__inner-wrap">
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
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_FULLNAME}}" class="common-input" value="{{$contact->fullname}}">
            <p class="example-text">例）山田</p>
          </div>
          <div class="contact__form-elem__has-example-div2">
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_FULLNAME}}" class="common-input" value="{{$contact->fullname}}">
            <p class="example-text">例）太郎</p>
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
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=1 
              @if($contact->gender != 2)
              checked
              @endif
            >
            <label>男性</label>
          </div>
          <div class="common-radio">
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=2
              @if($contact->gender == 2)
              checked
              @endif
            >
            <label>女性</label>
          </div>
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
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_EMAIL}}" class="common-input">
            <p class="example-text">例）test@example.com</p>
          </div>
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
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_POSTCODE}}" class="common-input">
            <p class="example-text">例）123-4567</p>
          </div>
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
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_ADDRESS}}" class="common-input">
            <p class="example-text">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
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
            <input type="text" name="{{\App\Consts\ParamConst::PARAM_BUILDINGNAME}}" class="common-input">
            <p class="example-text">例）千駄ヶ谷マンション101</p>
          </div>
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
          <textarea class="common-input contact__form__opinion" name="{{\App\Consts\ParamConst::PARAM_OPINION}}" rows="5"></textarea>
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