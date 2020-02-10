@extends('layouts.app')

@section('content')



<a href="/question/addQuestion" class="buttony4">Add a new question</a>

<h4>Choose a question: </h4>

@foreach ($mcqs as $mcq)

    
    <a href="/question/{{$mcq->id}}/">Question: {{$mcq->question}} </a>
    
    <br>
    <br>
@endforeach



@endsection