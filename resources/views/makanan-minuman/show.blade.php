@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">makananMinuman {{ $makananminuman->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/makanan-minuman') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/makanan-minuman/' . $makananminuman->id . '/edit') }}" title="Edit makananMinuman"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('makananminuman' . '/' . $makananminuman->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete makananMinuman" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $makananminuman->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $makananminuman->name }} </td></tr><tr><th> Harga </th><td> {{ $makananminuman->harga }} </td></tr><tr><th> Status </th><td> {{ $makananminuman->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
