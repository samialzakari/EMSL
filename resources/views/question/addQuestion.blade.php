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
@section('content')



<div class="form-style-2">
    <div class="form-style-2-heading">Fill out the question information below:</div>
    <form method="POST" action="" >
        @csrf
        <label for="question"><span>Question: <span class="required">*</span></span><input type="text" class="input-field" name="question" value="{{old('question')}}" /></label>

        <label><span>Chapter number</span><input type="text" class="tel-number-field" name="chapter_no" value="{{old('chapter_no')}}" maxlength="4" /></label>
        <label><span>Mark</span><input type="text" class="tel-number-field" name="tel_no_1" value="" maxlength="4" /></label>

        <label for="field5"><span>Answer <span class="required">*</span></span><input type="text" class="input-field" name="correct_answer" value="{{old('correct_answer')}}" /></label>
        <label for="field5"><span>Option 1 <span class="required">*</span></span><input type="text" class="input-field" name="option1" value="{{old('option1')}}" /></label>
        <label for="field5"><span>Option 2 <span class="required">*</span></span><input type="text" class="input-field" name="option2" value="{{old('option2')}}" /></label>
        <label for="field5"><span>Option 3 <span class="required">*</span></span><input type="text" class="input-field" name="option3" value="{{old('option3')}}" /></label>

        <button type="submit"> Submit </button>
    </form>
</div>

@endsection
