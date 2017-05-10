<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Image</label>
    <div class="col-lg-7">
        @if (count($errors) > 0)
        <div class="alert alert-danger" id="im">
            @foreach ($errors->all() as $error)
              <p class="error_item">{{ $error }}</p>
            @endforeach
        @endif
        @if (Session::get('success'))
            <img src="{{asset('thumbnails/'.Session::get('imagename')) }}" />
        @endif
        {!! Form::open(array('route' => 'intervention.postresizeimage','files'=>true, 'id'=>'imageform')) !!}
        {!! Form::file('photo', array('class' => 'form-control', 'class' => 'bnt btn-default', 'id' => 'uploadImage')) !!}<br>
        <button type="submit" id="imagebutton" class="btn btn-default">Upload Image</button><br><br>
        {!! Form::close() !!}
    </div>
</div>
<!-- $(".pager-next a.active").click(function(event) {
    if ($(this).text() != "1") {
        event.preventDefault();
    }           
}); -->

<script>
$(function () 
{
   $('form').on('submit', function (e) 
   {
      // e.preventDefault();
     
       var formData = new FormData($(this)[0]);

       $.ajax
       ({
            type: 'post',
            url: 'intervention-resize',
            data: formData,
            async: false,
            // data: $('form').serialize(),
            success: function () 
            {
               alert('form was submitted');
            },
           cache: false,
           contentType: false,
           processData: false
      });
   });
});
</script>
