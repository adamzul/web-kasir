@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Detailpesanan</div>
                    <div class="card-body">
                        <div>
                            <a href="{{ url('/detail-pesanan/create/'.$id) }}" class="btn btn-success btn-sm" title="Add New detailPesanan">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <div class="float-right">
                                <h4>meja : {{$pesanan->meja}}</h4>
                                <p>nomer : {{$pesanan->id}}</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <?php 
                        $total = 0;
                        foreach($detailpesanan as $item){
                            $total += $item->jumlah * $item->makanan->harga;                            
                        }
                        ?>
                        <h4>Total : Rp. {{$total}}</h4>
                        <form method="GET" action="{{ url('/detail-pesanan') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Id Makanan Minuman</th><th>Jumlah</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($detailpesanan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->makanan->name }}</td><td>{{ $item->jumlah }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/detail-pesanan/' . $item->id . '/edit') }}" title="Edit detailPesanan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/detail-pesanan' . '/' . $id .'/'. $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete detailPesanan" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $detailpesanan->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
