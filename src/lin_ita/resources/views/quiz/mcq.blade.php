@extends('layouts.app')
@section('title', '選択問題')

@section('content')
<h1 class="h3 mb-4">選択問題</h1>

<p class="fs-5">「{{ $word->japanese }}」に対応するイタリア語を選んでください。</p>

<form method="POST" action="{{ route('quiz.mcq.answer') }}">
  @csrf
  <input type="hidden" name="word_id" value="{{ $word->id }}">

  @foreach ($choices as $choice)
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="answer" value="{{ $choice }}" id="choice{{ $loop->index }}" required>
      <label class="form-check-label" for="choice{{ $loop->index }}">
        {{ $choice }}
      </label>
    </div>
  @endforeach

  <button class="btn btn-primary mt-3">回答する</button>
</form>
@endsection