<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Attempt;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function mcq()
    {
        $word = Word::inRandomOrder()->first();

        if (!$word) {
            return redirect()->route('words.index')->with('success', '単語がまだ登録されていません');
        }

        $choices = Word::where('id', '!=', $word->id)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('italian')
            ->toArray();

        $choices[] = $word->italian;
        shuffle($choices);

        return view('quiz.mcq', compact('word', 'choices'));
    }

    public function mcqAnswer(Request $request)
    {
        $word = Word::findOrFail($request->word_id);
        $userAnswer = $request->answer;
        $isCorrect = $userAnswer === $word->italian;

        Attempt::create([
            'word_id' => $word->id,
            'quiz_type' => 'mcq',
            'question' => $word->japanese,
            'correct_answer' => $word->italian,
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
        ]);

        return view('quiz.result', [
            'isCorrect' => $isCorrect,
            'correctAnswer' => $word->italian,
            'userAnswer' => $userAnswer,
        ]);
    }

    public function write()
    {
        $word = Word::inRandomOrder()->first();

        if (!$word) {
            return redirect()->route('words.index')->with('success', '単語がまだ登録されていません');
        }

        return view('quiz.write', compact('word'));
    }

    public function writeAnswer(Request $request)
    {
        $word = Word::findOrFail($request->word_id);
        $userAnswer = trim($request->answer);

        $isCorrect = mb_strtolower($userAnswer) === mb_strtolower($word->italian);

        Attempt::create([
            'word_id' => $word->id,
            'quiz_type' => 'write',
            'question' => $word->japanese,
            'correct_answer' => $word->italian,
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
        ]);

        return view('quiz.result', [
            'isCorrect' => $isCorrect,
            'correctAnswer' => $word->italian,
            'userAnswer' => $userAnswer,
        ]);
    }
}