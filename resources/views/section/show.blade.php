@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/FM">Home</a></li>
        <li>Section {{$section->id}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Section Page</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <a class="dropdown-item">Course: {{$section->course->name}}</a>
                            <a class="dropdown-item">Section: {{$section->id}}</a>
                            <a class="dropdown-item" href="/section/{{$section->id}}/student" style="font-weight: bold">Section's Students ▶</a>
                            <a class="dropdown-item" href="/section/{{$section->id}}/exam" style="font-weight: bold">Section's Exams ▶</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
