@extends('layouts.app')

@section('content')


    <h4>Choose the questions: </h4>

    <div class="form-style-2">
        <div class="form-style-2-heading">Fill out the exam information below:</div>
        <form method="POST" action="/exam" >
            @csrf
            <label for="{{$exam->id}}">Exam: {{ $exam->name }}</label>
            <label for="{{$exam->id}}"><input type="text" name="exam" value="{{$exam->id}}" /></label>
            <label for="question">Choose questions:
                @foreach( $mcqs as $mcq)
                    <input type="checkbox" name="questions[]" value="{{$mcq->id}}" />
                    <label for="{{$mcq->id}}" style="display: inline">{{$mcq->question}}</label>
                @endforeach
            </label>
            <button type="submit"> Submit </button>
        </form>
    </div>



@endsection
