@extends('layouts.app')
@section('title', '単語編集')

@section('content')
<h1 class="h3 mb-3">単語編集</h1>

<form method="POST" action="{{ route('words.update', $word) }}">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Italian</label>
    <input name="italian" class="form-control"
           value="{{ old('italian', $word->italian) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Japanese</label>
    <input name="japanese" class="form-control"
           value="{{ old('japanese', $word->japanese) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Gender</label>
    <input name="gender" class="form-control"
           value="{{ old('gender', $word->gender) }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Meaning</label>
    <input name="meaning" class="form-control"
           value="{{ old('meaning', $word->meaning) }}">
  </div>

  <button class="btn btn-primary">保存</button>
  <a class="btn btn-secondary" href="{{ route('words.index') }}">戻る</a>
</form>
@endsection