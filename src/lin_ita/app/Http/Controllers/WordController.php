<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::orderByDesc('id')->paginate(20);
        return view('words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('words.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
        'italian' => 'required|string|max:255',
        'japanese' => 'required|string|max:255',
        'gender' => 'nullable|string|max:50',
        'meaning' => 'nullable|string|max:255',
    ]);

    Word::create($validated);

    return redirect()->route('words.index')
                     ->with('success', '単語を登録しました');//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        return view('words.edit', compact('word'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        $validated = $request->validate([
            'italian' => 'required|string|max:255',
            'japanese' => 'required|string|max:255',
            'gender' => 'nullable|string|max:50',
            'meaning' => 'nullable|string|max:255',
        ]);

        $word->update($validated);

        return redirect()
            ->route('words.index')
            ->with('success', '単語を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();

        return redirect()
            ->route('words.index')
            ->with('success', '単語を削除しました');//
    }
}
