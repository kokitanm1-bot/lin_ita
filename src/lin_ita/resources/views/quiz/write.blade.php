@extends('layouts.app')
@section('title', '書き問題')

@section('content')
<h1 class="h3 mb-4">書き問題</h1>

<p class="fs-5">「{{ $word->japanese }}」のイタリア語を入力してください。</p>

<form method="POST" action="{{ route('quiz.write.answer') }}">
  @csrf
  <input type="hidden" name="word_id" value="{{ $word->id }}">

  <div class="mb-3">
    <input type="text" name="answer" class="form-control" required>
  </div>

  <button class="btn btn-success">回答する</button>
</form>
@endsection