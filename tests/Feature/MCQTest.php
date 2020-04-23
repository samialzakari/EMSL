<?php

namespace Tests\Feature;

//use PHPUnit\Framework\TestCase;
use App\User;
use Tests\TestCase;

class MCQTest extends TestCase
{
    /**
     * @test
     */
    public function cc_create_new_mcq()
    {
        $this->actingAs(User::find(2))
             ->post('/question/addQuestion',[
                 'question' => 'Which of the following phases takes the most time and resources?',
                 'chapter_no' => '3',
                 'mark' => '2',
                 'correct_answer' => 'Project Executing',
                 'option1' => 'Project Planning',
                 'option2' => 'Project Monitoring and Controlling',
                 'option3' => 'Project Closing',
                 'course_id' => '1'
             ])
             ->assertCreated();
    }
}
