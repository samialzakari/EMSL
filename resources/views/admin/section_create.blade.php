@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Create Section</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Fill the form with section information:

                        <form method="POST" action="/admin/course/{{$course->id}}" >
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}"/> <br>
                            <label for="fm_id">Choose Instructor:
                                <select name="fm_id">
                                    @foreach($fms as $fm)
                                        <option value="{{$fm->id}}">{{$fm->name}}</option>
                                    @endforeach
                                </select>
                            </label> <br>
                            <button type="submit"> Create </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
