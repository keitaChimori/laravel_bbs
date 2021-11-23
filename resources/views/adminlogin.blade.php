<!-- ***************************** -->
<!--        ログインページ         -->
<!-- ***************************** -->
@extends('layout')
@section('title','管理者ログイン | ひとこと掲示板 ')
@section('content')

<!-- ログインフォーム -->
<section class="container">
  <div class="col-md-8 col-lg-4 m-auto">
    <h1 class="pt-5 text-center">ひとこと掲示板</h1>
    <h3 class="text-center">〜管理者ログイン〜</h3>


    <div class="login-form mt-5 px-5 py-4 text-center">
    <!-- バリデーションエラー -->
    @if($errors->all())
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <!-- メッセージ -->
    @if(session('message'))
      <div class="alert alert-danger ">
        {{ session('message') }}
      </div>
    @endif
      <form action="{{ route('loginCheck') }}" method="post">
        @csrf
        <label for="password" class="h4">パスワード</label>
        <p>パスワードを入力してください</p>
        <input type="password" name="password" id="password" class="form-control">
        <input type="submit" value="ログイン" name="btn_submit" class="btn btn-primary w-100 my-4">
      </form>
      <a href="{{ route('showBoard') }}" class="">ひとこと掲示板TOPにもどる</a>
    </div>
  </div>
</section>

@endsection