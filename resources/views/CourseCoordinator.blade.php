@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Dashboard, Course Coordinator</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="dropdown-item" href="/exam">
                            {{$course}} Exams
                        </a>
                        <a class="dropdown-item" href="/question/index">
                            {{$course}} Question Bank
                        </a>

                        @foreach($sections as $section)
                            <a class="dropdown-item" href="/section/{{$section->id}}">
                                Course: {{$section->course->name}}, Section: {{$section->id}}
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
