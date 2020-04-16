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
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/student">Students</a></li>
        <li><a href="/admin/student/{{$student->id}}">{{$student->name}}</a></li>
        <li>Register Sections</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$student->name}}'s Sections</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/admin/student/{{$student->id}}" >
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}"/>

                            <label for="section_id">Choose Sections to Remove: <br>
                                @foreach( $student->enroll as $section)
                                    <input type="checkbox" name="unroll[]" value="{{$section->id}}" />
                                    <label for="{{$section->id}}" style="display: inline">Course: {{$section->course->name}}, Section: {{$section->id}}</label>
                                    <br>
                                @endforeach
                            </label> <br>

                            <label for="section_id">Choose Sections to Add: <br>
                                @foreach( $sections as $section)
                                    <input type="checkbox" name="sections[]" value="{{$section->id}}" />
                                    <label for="{{$section->id}}" style="display: inline">Course: {{$section->course->name}}, Section: {{$section->id}}</label>
                                    <br>
                                @endforeach
                            </label> <br>
                            <button type="submit" class="button1"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
