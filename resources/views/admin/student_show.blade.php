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

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #f44336;
        border-radius: 0.25rem;
    }

    .button2:hover {
        background-color: #f44336;
        color: white;
    }
</style>

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/student">Students</a></li>
        <li>{{$student->name}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$student->name}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Student e-mail: {{$student->email}}</p>
                        <p>Student Sections:</p>

                        @foreach($sections as $section)
                            <a class="dropdown-item">
                                Course: {{$section->course->name}} , Section Number: {{$section->id}} , Student Mark: {{\Illuminate\Support\Facades\DB::table('section_student')->where('section_id',$section->id)->where('student_id',$student->id)->value('mark') ?? 0}}
                            </a>
                        @endforeach


                        <div style="text-align: right; margin-top: 8px">
                            <button class="button1" onclick="window.location.href = '/admin/student/{{$student->id}}/section'" style="float: left">Sections Registration</button>
                            <button class="button1" onclick="window.location.href = '/admin/student/{{$student->id}}/edit'">Edit</button>
                            <form action="" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="button2"/>
                            </form>
                        </div>
                    <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
