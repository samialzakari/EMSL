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
{{--@section('content')--}}
{{--   <h5>Question: {{$mcq->question}} </h5>--}}
{{--   <h5> Mark:  {{$mcq->mark}}  </h5>--}}
{{--   <h5> Course:  {{$mcq->course_id}}  </h5>--}}
{{--   <h5> Chapter Number:  {{$mcq->chapter_no}}  </h5>--}}
{{--   <br>--}}
{{--   <h5> Correct answer: <label style="color:#32CD32">{{$mcq->correct_answer}} </label></h5>--}}

{{--   <h5> Option 1:  <label style="color:red">{{$mcq->option1}}  </label></h5>--}}
{{--   <h5> Option 2:  <label style="color:red">{{$mcq->option2}}  </label></h5>--}}
{{--   <h5> Option 3:  <label style="color:red">{{$mcq->option3}}  </label></h5>--}}
{{--    <br><br>--}}
{{--<a href="/question/{{$mcq->id}}/edit" class="likeabutton">Edit </a>--}}

{{--   <form action="" method="post" style="display: inline">--}}
{{--       @method('DELETE')--}}
{{--       @csrf--}}
{{--       <input type="submit" value="Delete" class="likeabutton2"/>--}}
{{--   </form>--}}
{{--@endsection--}}

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
