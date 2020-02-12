@extends('layouts.app')
<style type="text/css">

.likeabutton {
	background-color:#33bdef;
    padding:5px;
    color:white;
    padding:6px 24px;
    display:inline-block;


}
.likeabutton:hover {
    text-decoration:none! important;
    background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);

    color:white;
}


a:hover{
    text-decoration:none! important;
}
</style>

@section('content')

<a href="/question/addQuestion" class="likeabutton">Add a new question</a>


<h4>Choose a question: </h4>

@foreach ($mcqs as $mcq)

    
    <a href="/question/{{$mcq->id}}/">Question: {{$mcq->question}} </a>
    
    <br>
    <br>
@endforeach



@endsection