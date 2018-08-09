<div class="form-group {{ $errors->has('id_makanan_minuman') ? 'has-error' : ''}}">
    <label for="id_makanan_minuman" class="control-label">{{ 'Id Makanan Minuman' }}</label>
    <input class="form-control" name="id_makanan_minuman" type="number" id="id_makanan_minuman" value="{{ $detailpesanan->id_makanan_minuman or ''}}" >
    {!! $errors->first('id_makanan_minuman', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>
    <input class="form-control" name="jumlah" type="number" id="jumlah" value="{{ $detailpesanan->jumlah or ''}}" >
    {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
