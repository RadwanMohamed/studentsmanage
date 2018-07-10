    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"> update image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
            	 <form action="/photo/{{$userphotos->id}}/update" method="POST" enctype="multipart/form-data" class="editphotoform" >
                      <div id='photoeditform'> </div>
                    {{method_field('PUT')}}

                      {{csrf_field()}}
                    
                <div class="md-form mb-5" id="upimg">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">{{$userphotos->type}}</label>

                    <input type="file" name="img" id="defaultForm-email" class="form-control validate ">

                     <span class="help-block">
                    <strong class="upimg"></strong>
                    </span>

                   

                   

                </div>
                 <img src="http://localhost:8000/app/{{$userphotos->filename}}" width="250" height="250">
                <input type="hidden" name="key" value="{{$userphotos->type}}">
                  <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" id="savephoto">save</button>
            </div>
            </form>

            </div>
          
        </div>
    </div>
</div>


    <script>
    $(document).on('click','#savephoto',function(e){

        
        e.preventDefault();
        Button = $(this);
        form = Button.parents('.editphotoform');
        url = form.attr('action');
        data = new FormData(form[0]);
        result = form.find('#photoeditform');
       $.ajax({
           data:data,
           type: 'POST',
           url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
       dataType: 'json',
      beforeSend: function () {
          result.removeClass().addClass('alert alert-info').html('loading....');
        
        },
            error: function(data) {
                var error = data.responseJSON['errors'];

                if (error.hasOwnProperty('img'))
                {
                    $.each(error['img'], function (i,m) {
                        $("#upimg").removeClass().addClass('form-group has-error ');
                        $('.upimg').html(m).addClass('text-danger');
                    });

                }
                              
              else {
                   console.log(data.responseText);
                }
            },

            success: function (data) {
                    if(data.status == "failed"){
                        result.removeClass().addClass('alert alert-warning').html(data.msg);

                    }else {
                        result.removeClass().addClass('alert alert-success').html(data.msg);

                    }
            },
            cache: false,
            processData: false,
            contentType: false,



        })
    });
</script>