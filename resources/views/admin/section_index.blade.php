@extends('layouts.app')
<style type="text/css">
    .likeabutton {
        background-color:#33bdef;
        padding:5px;
        color:white;
        padding:6px 24px;
        display:inline-block;


    }
    .likeabutton:hover {
        text-decoration:none! important;
        background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
        color:white;
    }

    .likeabutton2 {
        background-color:red;
        padding:5px;
        color:white;
        padding:6px 24px;
        display:inline-block;


    }
    .likeabutton2:hover {
        text-decoration:none! important;
        background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
        color:white;
    }
</style>

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/course">Courses</a></li>
        <li>{{$course->name}}</li>
    </ul>
@endsection

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

                            <a href="" class="likeabutton">Edit </a>

                            <form action="" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="likeabutton2"/>
                            </form>

                        <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
