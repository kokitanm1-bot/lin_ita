@extends('layouts.app')
@section('title', '単語一覧')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">単語一覧</h1>
  <a class="btn btn-primary" href="{{ route('words.create') }}">＋ 新規</a>
</div>

<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>ID</th>
      <th>Italian</th>
      <th>Japanese</th>
      <th>Gender</th>
      <th>Meaning</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($words as $word)
      <tr>
        <td>{{ $word->id }}</td>
        <td>{{ $word->italian }}</td>
        <td>{{ $word->japanese }}</td>
        <td>{{ $word->gender }}</td>
        <td>{{ $word->meaning }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center text-muted py-4">
          まだ単語がありません。
        </td>
      </tr>
    @endforelse
  </tbody>
</table>

<div class="d-flex justify-content-center">
  {{ $words->links() }}
</div>
@endsection