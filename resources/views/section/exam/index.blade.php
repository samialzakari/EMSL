@extends('layouts.app')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color:#f5f5f5;}
</style>
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$course}} Exams</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th style="text-align: left">Exam</th>
                                <th style="text-align: center">Mark</th>
                                <th style="text-align: right">Date</th>
                            </tr>
                            @foreach($exams as $exam)
                                <tr>
                                    <td style="text-align: left"><a href="/section/{{$section->id}}/exam/{{$exam->id}}">{{$exam->name}}</a></td>
                                    <td style="text-align: center">{{$exam->mark}}</td>
                                    <td style="text-align: right">{{$exam->date}}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
