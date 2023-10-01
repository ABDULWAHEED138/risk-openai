<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use OpenAI;

class ShowQuestions extends Component
{
    public $firstQuestion = 1;
    public $answer;
    public $response = null;
    public $question = null;

    public function render()
    {
        $this->question = Question::where('id', $this->firstQuestion)->first();
        return view('livewire.show-questions');
    }

    public function submit()
    {
        $this->firstQuestion = Question::where('id', '>', $this->firstQuestion)->min('id');

        $this->response = null;
        $this->answer = null;
        $this->dispatch('refresh');
    }

    public function getResponse($answer)
    {
        $openAi = OpenAI::client(config('services.openai.api_key'));

        $prompt = 'You need to evaluate the quality of the answer according to the question asked.';
        $prompt .= "\n\n";
        $prompt .= 'Question: ' . $this->question->title;
        $prompt .= "\n\n";
        $prompt .= "Answer: {$answer}";
        $prompt .= "\n\n";
        $prompt .= 'Feedback:';

        $response = $openAi->completions()->create([
            'model'       => 'text-davinci-003',
            'prompt'      => $prompt,
            'max_tokens'  => 100,
            'temperature' => 0.5,

        ]);

        $this->response = $response['choices'][0]['text'];

        $this->dispatch('refresh');
    }
}
