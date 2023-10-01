<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'title' => 'Do you have an Anti-Virus installed? How often do you run scans?',
            ],
            [
                'title' => 'How do you backup data?',
            ],
            [
                'title' => 'What are your online privacy practices?',
            ],
            [
                'title' => 'Which programming languages do you prefer?',
            ]
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

    }
}
