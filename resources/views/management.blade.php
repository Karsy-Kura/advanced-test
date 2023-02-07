@extends('layouts.common')

@section('title', '問い合わせ 管理システム')
@section('css', 'management.css')

@section('header')
<h1 class="common-header__title">管理システム</h1>
@endsection('header')

@section('content')
<div class="content-wrap">

  <!-- 検索条件 -->
  <div class="search-cond">
    <form action="/contact/management/search" method="get">
      @csrf
      <div class="search-cond__elem-wrap">
        <!-- 名前 -->
        <div class="common-form-elem search-cond__elem-block1">
          <label for={{\App\Consts\ParamConst::PARAM_FULLNAME}} class="common-label wd-30">
            お名前
          </label>
          <input type="text" name={{\App\Consts\ParamConst::PARAM_FULLNAME}} class="common-input">
        </div>
        <!-- 性別 -->
        <div class="common-form-elem search-cond__elem-block1">
          <label for="{{\App\Consts\ParamConst::PARAM_GENDER}}" class="common-label wd-15">
            性別
          </label>
          <div class="common-radio">
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value="" checked><label>全て</label>
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=1><label>男性</label>
            <input type="radio" name="{{\App\Consts\ParamConst::PARAM_GENDER}}" value=2><label>女性</label>
          </div>
        </div>
      </div>
      <div class="common-form-elem search-cond__elem-block2">
        <label for="{{\App\Consts\ParamConst::PARAM_CREATEDAT}}" class="common-label wd-15">
          登録日
        </label>
        <input type="datetime" name="{{\App\Consts\ParamConst::PARAM_FROM}}" class="common-input">
        <label class="common-label">&emsp;～&emsp;</label>
        <input type="datetime" name="{{\App\Consts\ParamConst::PARAM_TO}}" class="common-input">
      </div>
      <div class="common-form-elem search-cond__elem-block1">
        <label for="{{\App\Consts\ParamConst::PARAM_CREATEDAT}}" class="common-label wd-30">
          メールアドレス
        </label>
        <input type="text" name="{{\App\Consts\ParamConst::PARAM_EMAIL}}" class="common-input">
      </div>
      <div class="common-button search-cond__button-wrap">
        <button class="common-button wd-15">検索</button>
        <a href="/contact/management" class="common-button search-cond__button-reset">リセット</a>
      </div>
    </form>
  </div>

  <!-- 問い合わせ一覧 -->
  <div class="contacts">
    <!-- 件数表示 -->
    <div class="contacts__header">
      <span class="contacts__header__num">
        全{{\App\Models\Contact::all()->count()}}件中 {{($contacts->currentPage()-1) * $contacts->perPage()+1}}-{{$contacts->currentPage() * $contacts->perPage()}}件
      </span>
      <!-- TODO: paginate表示 -->
      <span class="contacts__header__pagination">
        {{$contacts->links('vendor.pagination.semantic-ui')}}
      </span>
    </div>

    <!-- 一覧 -->
    <table class="contacts-list">
      <tr>
        <th class="wd-05">ID</th>
        <th class="wd-15">お名前</th>
        <th class="wd-05">性別</th>
        <th class="wd-15">メールアドレス</th>
        <th class="wd-30">ご意見</th>
        <th class="wd-05"></th>
      </tr>

      @foreach($contacts as $contact)
      <tr>
        <td>{{$contact[\App\Consts\ParamConst::PARAM_ID]}}</td>
        <td>{{$contact[\App\Consts\ParamConst::PARAM_FULLNAME]}}</td>
        <td>
          @if($contact[\App\Consts\ParamConst::PARAM_GENDER] == 1)
          男性
          @elseif($contact[\App\Consts\ParamConst::PARAM_GENDER] == 2)
          女性
          @endif
        </td>
        <td>{{$contact[\App\Consts\ParamConst::PARAM_EMAIL]}}</td>
        <td><p class="contacts-list__opinion">{{$contact[\App\Consts\ParamConst::PARAM_OPINION]}}</p></td>
        <td>
          <form action="/contact/management/delete?id={{$contact[\App\Consts\ParamConst::PARAM_ID]}}" method="post">
            @csrf
            <button class="common-button contacts-list__delete">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection

@section('script', 'manage.js')