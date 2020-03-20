@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$course->name}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Course Department: {{$course->department}}</p>
                        <p>Number of Chapters: {{$course->num_chapters}}</p>
                        <p>Course Coordinator: {{$cc->name}}</p>
                        <p>Course Sections:</p>

                        @foreach($sections as $section)
                            <a class="dropdown-item" href="/admin/section/{{$section->id}}">
                                Section Number: {{$section->id}} , Instructor: {{$section->facultyMember->name}}
                            </a>
                        @endforeach

                        <a class="dropdown-item" href="/admin/course/{{$course->id}}/create" style="font-weight: bold">
                            Add New Section
                        </a>

                        <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
