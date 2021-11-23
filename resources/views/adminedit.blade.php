<!-- ******************************* -->
<!--       管理者ページ 【編集】     -->
<!-- ******************************* -->
@extends('layout')
@section('title','ひとこと掲示板 | 管理者ページ【編集】')
@section('content')

<!-- 編集フォーム -->
<section>
  <div class="container">
    <div class="col-md-8 col-lg-4 m-auto">
      <h2 class="text-center pt-3">ひとこと掲示板</h2>
      <h4 class="text-center">〜管理者ページ【編集】〜</h4>
      <form action="{{ route('editDone') }}" method="POST" onsubmit="return check()">
        @csrf
        <div class="form-group mt-5">
          <label for="name">名前</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old ('name' , $edit_data -> name) }}">
          <!-- バリデーションエラー -->
          @if($errors->has('name'))
          <div class="text-danger">
            {{ $errors->first('name') }}
          </div>
          @endif
        </div>
        <div class="form-group mt-3">
          <label for="message">ひとことメッセージ</label>
          <textarea name="message" id="message" cols="30" rows="5" class="form-control">{{ old('message' , $edit_data -> message) }}</textarea>
          <!-- バリデーションエラー -->
          @if($errors->has('message'))
          <div class="text-danger">
            {{ $errors->first('message') }}
          </div>
          @endif
        </div>
        <div class="mt-3 text-center">
          <input type="hidden" name="id" value="{{ $edit_data -> id }}">
          <a href="{{ route('showAdmin') }}" class="btn btn-secondary ">戻る</a>
          <input type="submit" value="編集する" name="btn_submit" class="btn btn-primary mx-4">
        </div>
      </form>
    </div>
  </div>
</section>

<script type="text/javascript">
  // 投稿確認アラート
  function check() {
    if (window.confirm('この内容で投稿を更新しますか？')) {
      return true; //OK
    } else {
      return false; //キャンセル
    }
  }
</script>

@endsection