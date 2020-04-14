@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/CC">Home</a></li>
        <li><a href="/question/index">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Question Bank</a></li>
        <li>{{$mcq->question}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Question Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5>Question: {{$mcq->question}}  </h5>
                        <h5>Mark: {{$mcq->mark}} </h5>
                        <h5>Chapter Number: {{$mcq->chapter_no}}  </h5>
                        <br>
                        <h5>Correct answer: <label style="color:#32CD32">{{$mcq->correct_answer}} </label></h5>
                        <h5>Option 1: <label style="color:red">{{$mcq->option1}}  </label></h5>
                        <h5>Option 2: <label style="color:red">{{$mcq->option2}}  </label></h5>
                        <h5>Option 3: <label style="color:red">{{$mcq->option3}}  </label></h5>
                        <br>

                        <a href="/question/{{$mcq->id}}/edit" class="likeabutton">Edit </a>

                        <form action="" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="likeabutton2"/>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
