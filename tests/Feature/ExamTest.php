<?php

namespace Tests\Feature;

use App\Exam;
use App\MCQ;
use App\User;
use Tests\TestCase;

class ExamTest extends TestCase
{
    /**
     * @test
     */
    public function cc_add_new_mcq_to_existing_exam()
    {
        $this->actingAs(User::find(2));
        $exam = Exam::find(1);
        $mcq = MCQ::find(15);

        //Check the exam doesn't have the question
        $this->get('/exam/'.$exam->id)
             ->assertDontSee($mcq->question);

        //Add the question to the exam
        $this->post('/exam/'.$exam->id,[
                'questions' => [$mcq->id]
        ]);

        //Check if the question added successfully to the exam
        $this->get('/exam/'.$exam->id)
             ->assertSee($mcq->question);
    }
}
