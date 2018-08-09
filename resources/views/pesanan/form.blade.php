<div class="form-group {{ $errors->has('meja') ? 'has-error' : ''}}">
    <label for="meja" class="control-label">{{ 'Meja' }}</label>
    <input class="form-control" name="meja" type="number" id="meja" value="{{ $pesanan->meja or ''}}" >
    {!! $errors->first('meja', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
