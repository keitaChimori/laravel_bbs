<!-- ******************************* -->
<!--       管理者ページ 【削除】     -->
<!-- ******************************* -->
@extends('layout')
@section('title','ひとこと掲示板 | 管理者ページ【削除】')
@section('content')

<!-- 削除フォーム -->
<section class="container">
  <div class="col-md-8 col-lg-4 m-auto">
    <h2 class="text-center pt-3">ひとこと掲示板</h2>
    <h4 class="text-center">〜管理者ページ【削除】〜</h4>
    <form action="{{ route('deleteDone') }}" method="POST" onsubmit="return check()">
      @csrf
      <div class="form-group mt-5">
        <label for="name">名前</label><br>
        <input type="text" name="name" id="name" class="form-control" value="{{ old ('name' , $delete_data -> name) }}" disabled>
      </div>
      <div class="form-group mt-3">
        <label for="message">ひとことメッセージ</label><br>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" disabled>{{ old('name' , $delete_data -> message) }}</textarea>
      </div>
      <div class="mt-3 text-center">
        <input type="hidden" name="id" value="{{ $delete_data -> id }}">
        <a href="{{ route('showAdmin') }}" class="btn btn-secondary">戻る</a>
        <input type="submit" value="削除する" name="btn_submit" class="btn btn-primary mx-4">
      </div>
    </form>
  </div>
</section>

<script type="text/javascript">
  // 確認アラート
  function check() {
    if (window.confirm('投稿を削除しますか？')) {
      return true; //OK
    } else {
      return false; //キャンセル
    }
  }
</script>

@endsection