@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/CC">Home</a></li>
        <li>{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Exams</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Exams</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/exam/create" class="dropdown-item" style="font-weight: bold">Add a New Exam</a>

                        @foreach ($exams as $exam)
                            <a href="/exam/{{$exam->id}}/" class="dropdown-item">Exam: {{$exam->name}} </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
