@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <h1>403 . Unauthorized action</h1>
            </div>
        </div>
    </div>
@endsection
