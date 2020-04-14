@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/admin">Home</a></li>
        <li>Students</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Students</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="dropdown-item" href="/admin/student/create" style="font-weight: bold">
                            Add New Student
                        </a>

                        @foreach($students as $student)
                            <a class="dropdown-item" href="/admin/student/{{$student->id}}">
                                {{$student->name}}
                            </a>
                    @endforeach

                    <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
