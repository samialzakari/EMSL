@extends('layouts.app')
<style type="text/css">
    .form-style-2{
        max-width: 500px;
        padding: 20px 12px 10px 20px;
        font: 13px Arial, Helvetica, sans-serif;
    }
    .form-style-2-heading{
        font-weight: bold;
        font-style: italic;
        border-bottom: 2px solid #ddd;
        margin-bottom: 20px;
        font-size: 15px;
        padding-bottom: 3px;
    }
    .form-style-2 label{
        display: block;
        margin: 0px 0px 15px 0px;
    }
    .form-style-2 label > span{
        width: 100px;
        font-weight: bold;
        float: left;
        padding-top: 8px;
        padding-right: 5px;
    }
    .form-style-2 span.required{
        color:red;
    }
    .form-style-2 .tel-number-field{
        width: 40px;
        text-align: center;
    }
    .form-style-2 input.input-field, .form-style-2 .select-field{
        width: 48%;
    }
    .form-style-2 input.input-field,
    .form-style-2 .tel-number-field,
    .form-style-2 .textarea-field,
    .form-style-2 .select-field{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        border: 1px solid #C2C2C2;
        box-shadow: 1px 1px 4px #EBEBEB;
        -moz-box-shadow: 1px 1px 4px #EBEBEB;
        -webkit-box-shadow: 1px 1px 4px #EBEBEB;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        padding: 7px;
        outline: none;
    }
    .form-style-2 .input-field:focus,
    .form-style-2 .tel-number-field:focus,
    .form-style-2 .textarea-field:focus,
    .form-style-2 .select-field:focus{
        border: 1px solid #0C0;
    }
    .form-style-2 .textarea-field{
        height:100px;
        width: 55%;
    }
    .form-style-2 input[type=submit],
    .form-style-2 input[type=button]{
        border: none;
        padding: 8px 15px 8px 15px;
        background: #FF8500;
        color: #fff;
        box-shadow: 1px 1px 4px #DADADA;
        -moz-box-shadow: 1px 1px 4px #DADADA;
        -webkit-box-shadow: 1px 1px 4px #DADADA;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
    }
    .form-style-2 input[type=submit]:hover,
    .form-style-2 input[type=button]:hover{
        background: #EA7B00;
        color: #fff;
    }

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
        <li><a href="/CC">Home</a></li>
        <li><a href="/question/index">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Question Bank</a></li>
        <li><a href="/question/{{$mcq->id}}">{{$mcq->question}}</a></li>
        <li>Edit</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Fill out the question information below:</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="" >
                            @method('PUT')
                            @csrf
                            <input type="hidden" class="tel-number-field" name="course_id" value="{{Auth::user()->coordinate->id}}" />

                            <div class="form-group row">
                                <label for="question" class="col-md-4 col-form-label text-md-right">Question:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="question" value="{{$mcq->question}}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="chapter_no" class="col-md-4 col-form-label text-md-right">Chapter Number:</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="chapter_no" min="0" max="{{\Illuminate\Support\Facades\Auth::user()->coordinate->num_chapters}}" value="{{$mcq->chapter_no}}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mark" class="col-md-4 col-form-label text-md-right">Mark:</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="mark" min="0" max="99" value="{{$mcq->mark}}" autofocus required>
                                </div>
                            </div>


                            <label>Note: If the answers is True/False just fill correct answer and the first option</label>

                            <div class="form-group row">
                                <label for="option1" class="col-md-4 col-form-label text-md-right">First option:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="option1" value="{{$mcq->option1}}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="option2" class="col-md-4 col-form-label text-md-right">Second option:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="option2" value="{{$mcq->option2}}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="option3" class="col-md-4 col-form-label text-md-right">Third option:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="option3" value="{{$mcq->option3}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="option4" class="col-md-4 col-form-label text-md-right">Fourth Option:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="option4" value="{{ $mcq->option4 }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="correct_answer" class="col-md-4 col-form-label text-md-right">Choose the correct answer:</label>

                                <div class="col-md-6">
                                    <select name="correct_answer" class="form-control">
                                        <option value="option1">First Option</option>
                                        <option value="option2">Second Option</option>
                                        <option value="option3">Third Option</option>
                                        <option value="option4">Fourth Option</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button1">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
