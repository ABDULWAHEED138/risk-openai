<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class TextImprovementController extends Controller
{
    public function improveText(Request $request)
    {
        $prompt = '';
        $inputText = $request->input('text');

        $openai = OpenAI::client(config('services.openai.api_key'));

        $prompt = 'You need to evaluate the quality of the answer according to the question asked.';
        $prompt .= "\n\n";
        $prompt .= 'Question: Do you have an Anti-Virus installed? How often do you run scans?';
        $prompt .= "\n\n";
        $prompt .= "Answer: {$inputText}";
        $prompt .= "\n\n";
        $prompt .= 'Feedback:';

        $response = $openai->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 100,
            'temperature' => 0.5,

        ]);

        return response()->json([
            'improved_text' => $response,
        ]);
    }
}
