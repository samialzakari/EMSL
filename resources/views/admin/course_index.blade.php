@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Courses</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="dropdown-item" href="/admin/course/create" style="font-weight: bold">
                            Add New Course
                        </a>

                        @foreach($courses as $course)
                        <a class="dropdown-item" href="/admin/course/{{$course->id}}">
                            {{$course->name}}
                        </a>
                        @endforeach

                    <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
