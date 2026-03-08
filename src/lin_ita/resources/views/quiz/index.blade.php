@extends('layouts.app')
@section('title', 'クイズメニュー')

@section('content')
<h1 class="h3 mb-4">クイズメニュー</h1>

<div class="d-flex gap-3">
  <a href="{{ route('quiz.mcq') }}" class="btn btn-primary">選択問題</a>
  <a href="{{ route('quiz.write') }}" class="btn btn-success">書き問題</a>
</div>
@endsection