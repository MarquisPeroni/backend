<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        // Restituisce un elenco di tutte le risposte
        return Answer::all();
    }

    public function store(Request $request)
    {
        // Validazione della richiesta
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        // Creazione di una nuova risposta
        $answer = Answer::create($request->all());

        return response()->json($answer, 201);
    }

    public function show($id)
    {
        // Restituisce una risposta specifica
        $answer = Answer::find($id);
        if (!$answer) {
            return response()->json(['error' => 'Answer not found'], 404);
        }

        return response()->json($answer);
    }

    public function update(Request $request, $id)
    {
        // Validazione della richiesta
        $request->validate([
            'answer_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        // Aggiornamento di una risposta esistente
        $answer = Answer::find($id);
        if (!$answer) {
            return response()->json(['error' => 'Answer not found'], 404);
        }

        $answer->update($request->all());

        return response()->json($answer, 200);
    }

    public function destroy($id)
    {
        // Cancellazione di una risposta
        $answer = Answer::find($id);
        if (!$answer) {
            return response()->json(['error' => 'Answer not found'], 404);
        }

        $answer->delete();
        return response()->json(null, 204);
    }
}


