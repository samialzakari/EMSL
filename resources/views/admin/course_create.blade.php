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
        <li><a href="/admin/course">Courses</a></li>
        <li>Create Course</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Create Course</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Fill the form with course information:

                        <form method="POST" action="/admin/course" >
                            @csrf
                            <label for="name">Course name: <input type="text" name="name" value="{{old('name')}}" required/></label> <br>
                            <label for="department">Department: <input type="text" name="department" value="{{old('department')}}" required/></label> <br>
                            <label for="num_chapters">Number of chapters: <input type="number" name="num_chapters" value="{{old('num_chapters')}}" required/></label>
                            <br>
                            <label for="cc_id">Choose course coordinator:
                                <select name="cc_id" required>
                                    @foreach($fms as $fm)
                                        <option value="{{$fm->id}}">{{$fm->name}}</option>
                                    @endforeach
                                </select>
                            </label> <br>
                            <button type="submit" class="button1"> Create </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
