<div class="form-group ">
		<label for="id_makanan_minuman" class="control-label">{{ 'Makanan Minuman' }}</label>
		
					<select class="form-control" name="id_makanan_minuman"  id="id_makanan_minuman">
					@foreach($makananMinuman as $item)
			  		<option value="{{ $item->id }}">{{ $item->name }}</option>
			  	@endforeach

			</select> 
		{!! $errors->first('id_makanan_minuman', '<p class="help-block">:message</p>') !!}

		<label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>
		<input class="form-control" name="jumlah" type="number" id="jumlah"  >
		{!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
</div>