@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/CC">Home</a></li>
        <li><a href="/exam">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Exams</a></li>
        <li>{{$exam->name}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Exam Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5> Course:  {{$exam->course->name}}  </h5>
                        <h5>Exam: {{$exam->name}} </h5>
                        <h5> Mark:  {{$exam->mark}}  </h5>
                        <br>

                        @foreach($exam->mcqs as $mcq)
                            <h5> Question: <label>{{$mcq->question}} </label></h5>
                            <h5> Correct answer: <label style="color:#32CD32">{{$mcq->correct_answer}} </label></h5>
                            <h5> Question mark: <label>{{$mcq->mark}} </label></h5> <br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
