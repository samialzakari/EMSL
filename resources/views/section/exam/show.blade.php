@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Exam Page</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="dropdown-item">Course: {{$exam->course->name}}</a>
                        <a class="dropdown-item">Exam: {{$exam->name}}</a>
                        <a class="dropdown-item">Exam Marks: {{$exam->mark}}</a>
                        <a class="dropdown-item">Exam Date: {{$exam->date}}</a>

                        @if($isTaken)
                            <a class="dropdown-item">Average Students' Marks: {{$avg}}</a>
                            <a class="dropdown-item">Highest Students' Marks: {{$max}}</a>
                            <a class="dropdown-item">Lowest Students' Marks: {{$min}}</a>
                        @else
                            <a class="dropdown-item" href="/section/{{$section}}/exam/{{$exam->id}}/qrcode" style="font-weight: bold">Generate QR code for the exam</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
