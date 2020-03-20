
@extends('layouts.app')
@auth

@section('content')
<h4>Choose an exam to grade: </h4>

{{--@foreach ($exams as $exam)--}}

{{--    Course: {{$exam->course}}--}}
{{--    <br>--}}
{{--    Grade: {{$exam->grade}}--}}
{{--    <br>--}}
{{--    <br>--}}
{{--@endforeach--}}

<div class="visible-print text-center">
    {!! QrCode::size(500)->generate('Ok'); !!}
    <p>Scan me to return to the original page.</p>
</div>


@endsection

@else

    <h1>you r not allowed here</h1>


@endauth

