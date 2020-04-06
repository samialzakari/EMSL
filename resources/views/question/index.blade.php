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

{{--@section('content')--}}

{{--<a href="/question/addQuestion" class="likeabutton">Add a new question</a>--}}

{{--<h4>Choose a question: </h4>--}}

{{--@foreach ($mcqs as $mcq)--}}
{{--    <a href="/question/{{$mcq->id}}/">Question: {{$mcq->question}} </a>--}}
{{--    <br><br>--}}
{{--@endforeach--}}

{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Question Bank</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/question/addQuestion" class="dropdown-item" style="font-weight: bold">Add a New Question</a>

                        @foreach ($mcqs as $mcq)
                            <a href="/question/{{$mcq->id}}/" class="dropdown-item">Question: {{$mcq->question}} </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
