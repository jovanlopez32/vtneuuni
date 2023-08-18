<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenIAController extends Controller
{
    //
    public function textCompleteVT (Request $request) {

        $openaiApiKey = env('OPENAI_API_KEY');

        $professional_area = $request->professional_area;
        $college_degree = $request->college_degree;

        $content_system = 'Eres un asistente de la universidad Neuuni, tus usuarios han completado un test vocacional donde su area profesional es: ' . $professional_area . ' tu mision es solamente es responder preguntas relacionadas a el ambito educativo por ejemplo: que ventajas tiene esa area profesional, cual es su campo de trabajo, entre otras preguntas relacionadas a esto.' .  'La carrera de: ' . $college_degree . ' es la carrera de preferencia y debes de mecionar esta carrera en algunas preguntas.';


        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $openaiApiKey, // Configura tu clave API en el archivo services.php
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "system", "content" => $content_system,
                    "role" => "user", "content" => "El resultado de un test vocacional fue el siguiente:"
                    .  $college_degree .
                    "El area de esta carrera es:"
                    . $professional_area .
                    "Simula que conoces el test vocacional y dame un texto corto donde le digas que por sus aptitudes y habilidades puede aplicar a esta area, describiendo las aptitudes y las habilidades; despues porque la carrera es la mejor opcion para esa persona. El texto debe ser muy corto y no exceder de las 45 palabras."
                ]
            ],
            'temperature' => 0.7,
        ]);


        /* if ($response->successful()) {
            $data = $response->json();
            // Procesar la respuesta aquí
            return $data;
        } else {
            // Manejar la respuesta de error
            $statusCode = $response->status();
            $errorData = $response->json(); // Si la respuesta de error es en formato JSON

            return response()->json(['error' => $errorData], $statusCode);
        } */


        $data = $response->json();

        return $data['choices'][0]['message']['content'];
    }

    public function textResponseQuestion (Request $request) {

        $openaiApiKey = env('OPENAI_API_KEY');

        //$request->question; #Esta es la pregunta del usuario.
        //$request->professional_area; #Esta es el area profesional del usuario.
        //$request->college_degree; #Esta es la carrera del usuario.

        $professional_area = $request->professional_area;
        $college_degree = $request->college_degree;

        $content_system = 'Eres un asistente de Neuuni Universidad, Neuuni Universidad es una universidad 100% en linea, tus usuarios han completado un test vocacional donde su area profesional es: ' . $professional_area . ' tu mision es solamente es responder preguntas relacionadas a el ambito educativo por ejemplo: que ventajas tiene esa area profesional, cual es su campo de trabajo, entre otras preguntas relacionadas a esto.' .  'La carrera de: ' . $college_degree . ' es la carrera de preferencia y debes de mecionar esta carrera en algunas preguntas. Tu nombre como asistente es Nevil. Tus respuestas no deben de exceder de las 50 palabras. Neuuni significa nueva universidad. Si te piden un codigo de cualquier lenguaje de programacion, tu respondes que no puedes procesar esa informacion.';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $openaiApiKey, // Configura tu clave API en el archivo services.php
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "system",
                    "content" => $content_system,
                ],
                [
                    "role" => "user",
                    "content" => $request->question,
                ]
            ],
            'temperature' => 0.9,
            "max_tokens" => 1024,
        ]);

        $data = $response->json();

        /* return $data; */
        return $data['choices'][0]['message']['content'];
    }


}
