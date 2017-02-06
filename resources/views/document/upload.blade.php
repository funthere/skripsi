@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading">
                <center><b>{{ $project->project_name or '' }}</b></center>
                </div> 
                <br/>
                {!! Form::model($project, ['files'=> true, 'id'=>'form_documents']) !!}
                    <div id="form-file">
                        <div class="form-group">
                            <label class="col-md-2" ></label> <label for="file" class="col-md-2 control-label">File Name </label>
                                
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <input type="file" name="file[0]" required class="input_file" id=file0>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-warning btn-add-file" type="button" style="min-width: 40%;"><i class="fa fa-fw fa-plus"></i>  </button>
                            </div>
                        <br/>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-6">
                
                        &nbsp;&nbsp;&nbsp;&nbsp;</span><span class="col-md-8"></span><input class="btn btn-primary" type="submit" onClick="if ($('#inputPassword').val() != $('#inputPasswordConfirm').val()) { alert('Your password and password confirmation not the same!'); return false;  } else { return true; }" value="Upload"/>
                            </div>
                        </div>
                    <br/><br/><br/>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-footer')
<script>
$(document).ready(function() {

    var index = 1;
    $('.btn-add-file').on('click', function() {
        $('#form-file').append(
            '<div class="form-group">' +
                '<label class="col-md-2" ></label><label for="file" class="col-md-2 control-label">File Name </label>' +
                
                '<div class="col-md-4">' +
                    '<div class="input-group date">' +
                        '<input type="file" name="file[' + index + ']" required class="input_file" id="file'+index+'">' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<button class="btn btn-danger btn-delete-file" type="button" style="min-width: 40%;"><i class="fa fa-fw fa-minus"></i>  </button>' +
                '</div><br/>' +
            '</div>'
        );

        $('#file'+index).bind('change', function(e) {
          var f = this.files[0];
          // alert(f.size);
          if (f.size > 5*1024*1024 || f.fileSize > 5*1024*1024)
            {
               //show an alert to the user
               alert("File to be uploaded can't exceeds 5 MB!")

               //reset file upload control
               this.value = null;
            }

        });
        index++;
    });

    $('#form-file').on('click', '.btn-delete-file', function() {
        $(this).parent().parent().remove();
    });

    $('#file0').bind('change', function(e) {
      var f = this.files[0];
      // alert(f.size);
      if (f.size > 5*1024*1024 || f.fileSize > 5*1024*1024)
        {
           //show an alert to the user
           alert("File to be uploaded can't exceeds 5 MB!")

           //reset file upload control
           this.value = null;
        }

    });

});
</script>
@stop
