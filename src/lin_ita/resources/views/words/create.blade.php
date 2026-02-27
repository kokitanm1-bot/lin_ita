@extends('layouts.app')
@section('title', '単語登録')

@section('content')
<h1 class="h3 mb-3">単語登録</h1>

<form method="POST" action="{{ route('words.store') }}">
  @csrf

  <div class="mb-3">
    <label class="form-label">Italian</label>
    <input name="italian" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Japanese</label>
    <input name="japanese" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Gender</label>
    <input name="gender" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Meaning</label>
    <input name="meaning" class="form-control">
  </div>

  <button class="btn btn-primary">登録</button>
  <a class="btn btn-secondary" href="{{ route('words.index') }}">戻る</a>
</form>
@endsection