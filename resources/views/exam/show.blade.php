@extends('layouts.app')
<style type="text/css">
    .likeabutton {
        background-color:#33bdef;
        padding:5px;
        color:white;
        padding:6px 24px;
        display:inline-block;


    }
    .likeabutton:hover {
        text-decoration:none! important;
        background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
        color:white;
    }

    .likeabutton2 {
        background-color:red;
        padding:5px;
        color:white;
        padding:6px 24px;
        display:inline-block;


    }
    .likeabutton2:hover {
        text-decoration:none! important;
        background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
        color:white;
    }



</style>
@section('content')


    <h5> Course:  {{$exam->course->name}}  </h5>
    <h5>Exam: {{$exam->name}} </h5>
    <h5> Mark:  {{$exam->mark}}  </h5>
    <br>
    @foreach($exam->mcqs as $mcq)
    <h5> Question: <label>{{$mcq->question}} </label></h5>
    <h5> Correct answer: <label style="color:#32CD32">{{$mcq->correct_answer}} </label></h5> <br>
    @endforeach


@endsection
