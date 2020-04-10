@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Scan the QR Code</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="visible-print text-center">
                            {!! QrCode::size(480)->generate('exam/'.$exam); !!}
                        </div>

                        <div style="text-align: center">
                            <button type="button" onclick="window.location.href = '{{$url}}'" > Done </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
