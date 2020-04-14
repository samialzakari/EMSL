@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/FM">Home</a></li>
        <li><a href="/section/{{$section}}">Section {{$section}}</a></li>
        <li><a href="/section/{{$section}}/student">Students</a></li>
        <li>{{$student->name}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$student->name}}'s Information for {{$course}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="dropdown-item">Student Name: {{$student->name}}</a>
                        <a class="dropdown-item">Student Email: {{$student->email}}</a>
                        <a class="dropdown-item">Total Marks: {{$totMarks}}</a>
                        <a class="dropdown-item">Student Exams:</a>

                        @foreach($marks as $mark)
                            <a class="dropdown-item">Exam: {{\App\Exam::find($mark->exam_id)->name}} , Mark: {{$mark->student_mark}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
