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

.likeabutton2 {
	background-color:red;
    padding:5px;
    color:white;
    padding:6px 24px;
    display:inline-block;


}
.likeabutton2:hover {
    text-decoration:none! important;
    background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
    color:white;
}



</style>
@section('content')




    
   <h5>Question: {{$mcq->question}} </h5>
   <br>
   <h5> Correct answer: <label style="color:#32CD32">{{$mcq->correct_answer}} </lable></h5>

   <h5> Option 1:  <label style="color:red">{{$mcq->option1}}  </lable></h5>
   <h5> Option 2:  <label style="color:red">{{$mcq->option2}}  </lable></h5>
   <h5> Option 3:  <label style="color:red">{{$mcq->option3}}  </lable></h5>
   
    <br>
    <br>
<a href="" class="likeabutton">Edit </a>  &nbsp;&nbsp; <a href="question/{id}/delete" class="likeabutton2">Delete</a>



@endsection