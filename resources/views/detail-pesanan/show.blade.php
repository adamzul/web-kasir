@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">detailPesanan {{ $detailpesanan->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/detail-pesanan') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/detail-pesanan/' . $detailpesanan->id . '/edit') }}" title="Edit detailPesanan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('detailpesanan' . '/' . $detailpesanan->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete detailPesanan" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $detailpesanan->id }}</td>
                                    </tr>
                                    <tr><th> Id Makanan Minuman </th><td> {{ $detailpesanan->id_makanan_minuman }} </td></tr><tr><th> Jumlah </th><td> {{ $detailpesanan->jumlah }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
