@extends('layouts.app')

@section('content')
		<div class="container">
				<div class="row">
						@include('admin.sidebar')

						<div class="col-md-9">
								<div class="card">
										<div class="card-header">Create New detailPesanan</div>
										<div class="card-body">
												<a href="{{ url('/detail-pesanan') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
												<br />
												<br />
												<a href="#" class="btn btn-success btn-sm" id="tambah" onclick="tambah()" title="Add New detailPesanan">
														<i class="fa fa-plus" aria-hidden="true"></i> tambah item
												</a>

												@if ($errors->any())
														<ul class="alert alert-danger">
																@foreach ($errors->all() as $error)
																		<li>{{ $error }}</li>
																@endforeach
														</ul>
												@endif
												<br>
												<br>
												<form method="POST" action="{{ url('/detail-pesanan/'.$id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="formBody">
														{{ csrf_field() }}
														<div class="form-group">
															<input class="btn btn-primary" type="submit" value="Simpan">
													</div>
												</form>

										</div>
								</div>
						</div>
				</div>
				
		</div>

		
@endsection
@section('jsasset')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
		var counter = 0;
		function tambah(){
				var tes ="<div class='form-group '><label for='id_makanan_minuman' class='control-label'>Makanan Minuman</label><select class='form-control' name='id_makanan_minuman["+counter+"]'  id='id_makanan_minuman'><?php foreach($makananMinuman as $item){ echo '<option value='.$item->id .'>'.$item->name.'</option>.'; } ?></select> <label for='jumlah' class='control-label'>Jumlah</label><input class='form-control' name='jumlah["+counter+"]' type='number' id='jumlah'  ></div>";
				$('#formBody').append(tes);
				counter++;
		}
</script>
@endsection
