@extends('layouts.app')

<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid rgb(88, 151, 163);
        border-radius: 0.25rem;
    }

    .button1:hover {
        background-color: rgb(88, 151, 163);
        color: white;
    }
</style>

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/CC">Home</a></li>
        <li><a href="/exam">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Exams</a></li>
        <li><a href="/exam/{{$exam->id}}">{{$exam->name}}</a></li>
        <li>Add new questions</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Choose questions you want to add to the exam:</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/exam/{{$exam->id}}" >
                            @csrf
                            <label for="{{$exam->id}}"><input type="hidden" name="exam" value="{{$exam->id}}" /></label>

                            <div class="form-group row">
                                <label for="{{$exam->id}}" class="col-md-4 col-form-label text-md-right">Exam:</label>

                                <div class="col-md-5">
                                    <label for="exam" class="col-md-4 col-form-label text-md-left">{{ $exam->name }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="question" class="col-md-4 col-form-label text-md-right">Choose questions:</label>

                                <div class="col-md-6">
                                    @foreach($mcqs as $mcq)
                                        <input type="checkbox" name="questions[]" value="{{$mcq->id}}" autofocus>
                                        <label for="{{$mcq->id}}" >{{$mcq->question}}</label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button1">
                                        Add the questions
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
