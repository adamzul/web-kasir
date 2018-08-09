@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pesanan</div>
                    <div class="card-body">
                        <a href="{{ url('/pesanan/create') }}" class="btn btn-success btn-sm" title="Add New pesanan">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/pesanan') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Meja</th><th>User</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pesanan as $item)
                                    <tr>
                                        <td>{{  $item->id }}</td>
                                        <td>{{ $item->meja }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/pesanan/' . $item->id . '/edit') }}" title="Edit pesanan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <a href="{{ url('/detail-pesanan/' . $item->id) }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Item</button></a>
                                            @if(Auth::user()->role == "kasir")
                                            <a href="{{ url('/pesanan/bayar/'.$item->id) }}" title="Bayar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Bayar</button></a>
                                            @endif
                                            <form method="POST" action="{{ url('/pesanan' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete pesanan" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pesanan->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
