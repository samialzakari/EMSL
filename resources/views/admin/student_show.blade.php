@extends('layouts.app')

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
                            <a class="dropdown-item" href="/admin/section/{{$section->id}}">
                                Section Number: {{$section->id}} , Student Mark: {{$section->mark ?? 0}}
                            </a>
                        @endforeach

                        <a class="dropdown-item" href="/admin/student/{{$student->id}}/section" style="font-weight: bold">
                            Register New Section
                        </a>

                    <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
