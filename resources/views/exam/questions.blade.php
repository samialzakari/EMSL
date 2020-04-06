@extends('layouts.app')

{{--@section('content')--}}

{{--    <h4>Choose the questions: </h4>--}}

{{--    <div class="form-style-2">--}}
{{--        <div class="form-style-2-heading">Fill out the exam information below:</div>--}}
{{--        <form method="POST" action="/exam" >--}}
{{--            @csrf--}}
{{--            <label for="{{$exam->id}}">Exam: {{ $exam->name }}</label>--}}
{{--            <label for="{{$exam->id}}"><input type="hidden" name="exam" value="{{$exam->id}}" /></label>--}}
{{--            <label for="question">Choose questions:--}}
{{--                @foreach( $mcqs as $mcq)--}}
{{--                    <input type="checkbox" name="questions[]" value="{{$mcq->id}}" />--}}
{{--                    <label for="{{$mcq->id}}" style="display: inline">{{$mcq->question}}</label>--}}
{{--                @endforeach--}}
{{--            </label>--}}
{{--            <button type="submit"> Submit </button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Fill out the exam information below:</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/exam" >
                            @csrf
                            <label for="{{$exam->id}}"><input type="hidden" name="exam" value="{{$exam->id}}" /></label>

                            <div class="form-group row">
                                <label for="{{$exam->id}}" class="col-md-4 col-form-label text-md-right">Exam:</label>

                                <div class="col-md-5">
                                    <label for="course" class="col-md-4 col-form-label text-md-left">{{ $exam->name }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="question" class="col-md-4 col-form-label text-md-right">Choose questions:</label>

                                <div class="col-md-6">
                                    @foreach($mcqs as $mcq)
                                        <input type="checkbox" name="questions[]" value="{{$mcq->id}}" autofocus required>
                                        <label for="{{$mcq->id}}" class="col-md-6 col-form-label text-md-left">{{$mcq->question}}</label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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
