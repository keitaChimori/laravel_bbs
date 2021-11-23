<!-- ***************************** -->
<!--          管理者ページ         -->
<!-- ***************************** -->
@extends('layout')
@section('title','ひとこと掲示板 | 管理者ページ')
@section('content')

<section class="container">
  <div class="col-md-8 col-lg-10 m-auto">
    <h1 class="text-center pt-3">ひとこと掲示板</h1>
    <h2 class="text-center">〜管理者ページ〜</h2>


    <!-- サクセスメッセージ -->
    @if(session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif

    <!-- ログアウト -->
    <div class="logout">
      <a href="{{ route('logout') }}" class="btn btn-danger mb-3">ログアウト</a>
    </div>

    <!-- 投稿表示 -->
      @foreach($all_data as $value)
    <div class="post mt-3 p-3">
    <div>
      <h4>{{ $value -> name }}<span class="mx-3">{{ $value -> created_at }}</span>
      <button type="button" onclick="location.href='/admin/delete/{{ $value -> id }}'" class="btn btn-danger">削除</button>
      <button type="button" onclick="location.href='/admin/edit/{{ $value -> id }}'" class="btn btn-primary">編集</button>
      </h4>
    </div>
      <p class="mb-0">{{ $value -> message }}</p>
      
    </div>
      @endforeach
  </div>
</section>

@endsection
