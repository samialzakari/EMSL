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
                        @if($mcq->option2 !== null)
                        <h5>Option 2: <label style="color:red">{{$mcq->option2}}  </label></h5>
                        @endif
                        @if($mcq->option3 !== null)
                        <h5>Option 3: <label style="color:red">{{$mcq->option3}}  </label></h5>
                        @endif
                        <br>


                        <div style="text-align: right; margin-top: 8px">
                            <button class="button1" onclick="window.location.href = '/question/{{$mcq->id}}/edit'">Edit</button>
                            <form action="" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="button2"/>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
