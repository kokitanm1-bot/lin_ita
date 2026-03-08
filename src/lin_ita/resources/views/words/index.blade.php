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
      <th class="text-end">操作</th>
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

        {{-- ここ追加 --}}
        <td class="text-end">
          <a class="btn btn-sm btn-outline-secondary"
             href="{{ route('words.edit', $word) }}">
             編集
          </a>

          <form action="{{ route('words.destroy', $word) }}"
                method="POST"
                class="d-inline"
                onsubmit="return confirm('削除しますか？')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">
              削除
            </button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="6" class="text-center text-muted py-4">
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