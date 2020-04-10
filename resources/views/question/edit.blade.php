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
</style>
{{--@section('content')--}}



{{--    <div class="form-style-2">--}}
{{--        <div class="form-style-2-heading">Fill out the question information below:</div>--}}
{{--        <form method="POST" action="" >--}}
{{--            @method('PUT')--}}
{{--            @csrf--}}
{{--            <label for="question"><span>Question: <span class="required">*</span></span>--}}
{{--                <input type="text" class="input-field" name="question" value="{{ $mcq->question }}" /></label>--}}

{{--            <label><span>Chapter number</span>--}}
{{--                <input type="text" class="tel-number-field" name="chapter_no" value="{{$mcq->chapter_no}}" maxlength="4" /></label>--}}

{{--            <label><span>Mark</span>--}}
{{--                <input type="text" class="tel-number-field" name="mark" value="{{$mcq->mark}}" maxlength="4" /></label>--}}

{{--            <label><span>Course id: </span>--}}
{{--                <input type="number" class="tel-number-field" name="course_id" value="{{$mcq->course_id}}" maxlength="4" /></label>--}}

{{--            <label for="field5"><span>Answer <span class="required">*</span></span>--}}
{{--                <input type="text" class="input-field" name="correct_answer" value="{{$mcq->correct_answer}}" /></label>--}}
{{--            <label for="field5"><span>Option 1 <span class="required">*</span></span>--}}
{{--                <input type="text" class="input-field" name="option1" value="{{$mcq->option1}}" /></label>--}}
{{--            <label for="field5"><span>Option 2 <span class="required">*</span></span>--}}
{{--                <input type="text" class="input-field" name="option2" value="{{$mcq->option2}}" /></label>--}}
{{--            <label for="field5"><span>Option 3 <span class="required">*</span></span>--}}
{{--                <input type="text" class="input-field" name="option3" value="{{$mcq->option3}}" /></label>--}}

{{--            <button type="submit"> Submit </button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--@endsection--}}

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
                                <label for="correct_answer" class="col-md-4 col-form-label text-md-right">Correct answer:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="correct_answer" value="{{$mcq->correct_answer}}" autofocus required>
                                </div>
                            </div>

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
                                    <input type="text" class="form-control" name="option3" value="{{$mcq->option3}}" autofocus required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
