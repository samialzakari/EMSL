@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/CC">Home</a></li>
        <li>{{\Illuminate\Support\Facades\Auth::user()->coordinate->name}} Question Bank</li>
    </ul>
@endsection

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
