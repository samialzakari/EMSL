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
                    <div class="card-header" style="background:rgba(88,152,164,1)">{{$course}} Section: {{$section->id}} Students</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th >Name</th>
                                <th >Mark</th>
                            </tr>
                            @foreach($students as $student)
                                <tr>
                                    <td><a href="/section/{{$section->id}}/student/{{$student->student_id}}">{{\App\User::find($student->student_id)->name}}</a></td>
                                    <td>{{$student->mark}}</td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
