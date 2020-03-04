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


    a:hover{
        text-decoration:none! important;
    }
</style>

@section('content')



    <a href="/exam/create" class="likeabutton">Add a new exam</a>


    <h4>Choose an exam: </h4>

    @foreach ($exams as $exam)


        <a href="/exam/{{$exam->id}}/">Exam: {{$exam->name}} </a>

        <br>
        <br>
    @endforeach



@endsection
