@extends('layouts.app')

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
                    <div class="card-header" style="background:rgba(88,152,164,1)">Register Sections</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/admin/student/{{$student->id}}" >
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}"/>
                            <label for="section_id">Choose {{$student->name}}'s Sections: <br>
                                @foreach( $sections as $section)
                                    <input type="checkbox" name="sections[]" value="{{$section->id}}" />
                                    <label for="{{$section->id}}" style="display: inline">Course: {{$section->course->name}}, Section: {{$section->id}}</label>
                                    <br>
                                @endforeach
                            </label> <br>
                            <button type="submit"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
