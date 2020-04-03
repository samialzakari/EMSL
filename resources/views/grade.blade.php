
@extends('layouts.app')
@auth

@section('content')
<h4>Scan the QR Code </h4>

{{--@foreach ($exams as $exam)--}}

{{--    Course: {{$exam->course}}--}}
{{--    <br>--}}
{{--    Grade: {{$exam->grade}}--}}
{{--    <br>--}}
{{--    <br>--}}
{{--@endforeach--}}

<div class="visible-print text-center">
    {!! QrCode::size(500)->generate('Hello World'); !!}

</div>


@endsection

@else

{{--    <h1>you r not allowed here</h1>--}}


@endauth

