@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Dashboard, Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="dropdown-item" href="/admin/course">
                            Courses
                        </a>
                        <a class="dropdown-item" href="/admin/fm">
                            Faculty Members
                        </a>
                        <a class="dropdown-item" href="/admin/student">
                            Students
                        </a>

                    <!--You are logged in! {{Auth::user()->name}}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
