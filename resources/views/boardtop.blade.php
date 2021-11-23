<!-- ***************************** -->
<!--       掲示板トップページ      -->
<!-- ***************************** -->
@extends('layout')
@section('title','ひとこと掲示板 | トップページ')
@section('content')

<!-- 投稿フォーム -->
<section class="container">
  <div class="col-md-8 col-lg-6 m-auto">
    <h1 class="text-center pt-3">ひとこと掲示板</h1>

    <!-- サクセスメッセージ -->
    @if(session('message'))
    <div class="alert alert-success mb-0">{{ session('message') }}</div>
    @endif

    <form action="{{ route('addBoard') }}" method="POST" onsubmit="return check()">
      @csrf
      <div class="form-group mt-5">
        <label for="name">名前</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
      </div>
      <!-- バリデーションエラー表示 -->
      @if($errors->has('name'))
          <p class="text-danger">{{ $errors->first('name') }}</p>
      @endif

      <div class="form-group mt-3">
        <label for="message">ひとことメッセージ</label>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
        <!-- バリデーションエラー表示 -->
        @if($errors->has('message'))
          <p class="text-danger">{{ $errors->first('message') }}</p>
        @endif
        
      </div>
      <div class="my-3 text-center">
        <input type="submit" value="投稿する" name="btn_submit" class="btn btn-primary">
      </div>
    </form>
  </div>

    <!-- 投稿表示 -->
    <div class="col-md-8 col-lg-10 m-auto" >
      @foreach($all_data as $value)
      <div class="post my-3 p-3">
        <h4>{{ $value -> name }}
        <span class="mx-3">{{ $value -> created_at -> format('Y/m/d H:m') }}</span></h4>
        <p class="mb-0">{{ $value -> message }}</p>
      </div>
      @endforeach
    </div>
  
</section>

<script type="text/javascript">
// 投稿確認アラート
  function check(){
    if(window.confirm('この内容で投稿しますか？')){
      return true; //OK
    }else{
      return false;//キャンセル
    }
  }
</script>
@endsection