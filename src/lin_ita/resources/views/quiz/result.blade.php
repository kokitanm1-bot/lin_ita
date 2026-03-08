@extends('layouts.app')
@section('title', '結果')

@section('content')
<h1 class="h3 mb-4">結果</h1>

@if ($isCorrect)
  <div class="alert alert-success">正解です！</div>
@else
  <div class="alert alert-danger">不正解です。</div>
@endif

<p><strong>あなたの回答:</strong> {{ $userAnswer }}</p>
<p><strong>正解:</strong> {{ $correctAnswer }}</p>

<div class="mt-3">
  <a href="{{ route('quiz.mcq') }}" class="btn btn-primary">選択問題を続ける</a>
  <a href="{{ route('quiz.write') }}" class="btn btn-success">書き問題を続ける</a>
  <a href="{{ route('quiz.index') }}" class="btn btn-secondary">メニューへ戻る</a>
</div>
@endsection