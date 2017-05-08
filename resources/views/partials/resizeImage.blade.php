<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Image</label>
    <div class="col-lg-7">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p class="error_item">{{ $error }}</p>
            @endforeach
        @endif
        @if (Session::get('success'))
            <img src="{{asset('thumbnails/'.Session::get('imagename')) }}" />
        @endif
        {!! Form::open(array('route' => 'intervention.postresizeimage','files'=>true)) !!}
        {!! Form::file('photo', array('class' => 'form-control', 'class' => 'bnt btn-default')) !!}<br>
        <button type="submit" class="btn btn-default">Upload Image</button><br><br>
        {!! Form::close() !!}
    </div>
</div>