<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    //

    public function questions() {
        return Inertia::render('Test/Questions');
    }

    public function answer(Request $request) {
        $answerPrediction = $request->session()->get('prediction');

        if($answerPrediction == null) { return redirect()->route('test.questions'); }

        return Inertia::render('Test/Answer', compact('answerPrediction'));
    }

    public function processAnswer(Request $request) {
        #Almacenamos el array de prediccion que nos arrojo tensorflow.
        session(['prediction' => $request->answer[0]]);
        return redirect()->route('test.answer');
    }

    public function cleanS(Request $request) {
        $request->session()->flush();
    }
}
