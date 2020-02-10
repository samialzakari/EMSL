
@extends('layouts.app')
@auth

@section('content')
<h4>Choose an exam to grade: </h4>

@foreach ($exams as $exam)

    Course: {{$exam->course}}
    <br>
    Grade: {{$exam->grade}}
    <br>
    <br>
@endforeach



@endsection

@else

    <h1>you r not allowed here</h1>


@endauth

