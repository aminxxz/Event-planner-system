<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PDview')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Create event</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <form method="POST" action="{{route('create-event')}}" >
                    <br> 
                    @csrf
                  <div class="col-lg">
                    <div class="trainer-item"> 
                      <div class="form-group form-group__complex " data-field="Experiences">
                        <h4 class="title__secondary"></h4>
                        <div class="complex-wrapper">
                          
                              <div class="form-group form-group__half ">
                                  
                                 
                                  <label class="form-label" for="createEvent">Event Name </label>
                                  <input type="text" class="form-control" name="event_name" required />
                              </div>
                              <div class="form-group form-group__half ">
                                  <label class="form-label">Overview </label>
                                  <input type="text" class="form-control" name="event_overview" required />
                              </div>
                              <div class="form-group form-group__half ">
                                  <label class="form-label">Event Date</label>
                                  <input type="date" class="form-control" name="event_date" required/>
                              </div>
                              <input type="hidden" class="form-control" name="event_status" value="On-going" required />
                        <div id='complexFields_Experiences' aria-label="Experiences">
                            <div class="clearfix complex complex-item">
                              <div class="form-group form-group__half ">
                                  <label class="form-label" >Add Bureau</label>
                                  <select name="bureau_id[]" class="form-control">
                                    @foreach ($bureau as $bureaus)
                                    <option value="{{$bureaus->bureau_id}}">{{$bureaus->bureau_name}}</option>
                                   @endforeach
                                </select>
                              </div>
                              <div class="form-group form-group__half ">
                                <label class="form-label" >Assignee</label>
                                <select name="stud_id[]" class="form-control">
                                    @foreach ($committee as $committees)
                                  <option value="{{$committees->stud_id}}">{{$committees->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group form-group_add">
                                <button style="background-color: #008CBA; color:white" class="add btn btn_info" onclick='addComplexField_Experiences(); return false;' >Add another bureau</button>
                            </div>
                              <div class="form-group form-group__remove">
                                  <button type="button" style="background-color: #f44336; color:white" class="remove btn btn_danger">Remove</button>
                              </div>
                            </div>
                          </div>
                        </div>
                          
                      </div>

                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary float-right">
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

<!-- jQuery -->
<script src="asset/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="asset/js/popper.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="asset/js/scrollreveal.min.js"></script>
<script src="asset/js/waypoints.min.js"></script>
<script src="asset/js/jquery.counterup.min.js"></script>
<script src="asset/js/imgfix.min.js"></script> 
<script src="asset/js/mixitup.js"></script> 
<script src="asset/js/accordions.js"></script>

<!-- Global Init -->
<script src="asset/js/custom.js"></script>


<script>
 var i_Experiences= 1 + 1;function addComplexField_Experiences() {
      $('#complexFields_Experiences').removeClass('complex clearfix');
      if ($('#complexFields_Experiences .complex-item:hidden').length) {
          $('#complexFields_Experiences .complex-item')
              .show()
              .find('input').first().focus();
          return;
      }
      if (typeof(tinymce) != 'undefined') {
          tinymce.remove();
      }
      var newField = ExperiencesTemplate.clone();

      var str = newField.html();
      var newStr = str.replace(/\[1]/g, '['+i_Experiences+']')
          .replace(/id="([a-z_]+)\d+"/gi, 'id="$1'+i_Experiences+'"') // labels
          .replace(/for="([a-z_]+)\d+"/gi, 'for="$1'+i_Experiences+'"'); // labels
      newField.html(newStr);
      newField.find('textarea').val('');
      newField.appendTo('#complexFields_Experiences');

      if (typeof(tinymce) != 'undefined' && typeof(disable_wysiwyg) == 'undefined') {
          tinymce.init(tinyconfig);
      }

      newField.find('input[type=text]').val('');
      newField.find('.form-group__range input').attr('value', ''); //почему то только так обнуляется значение в инпуте

      $('.form-control__visible').datepicker({
          language: 'en',
          autoclose: true,
          format: 'M yyyy',
          startView: 1,
          minViewMode: 1,
          startDate: new Date(1940, 1 - 1, 1),
          endDate: '+10y',
          orientation: 'bottom'
      });

      $('.form-control__visible').on('change', function() {
          $(this).closest('.form-group').find('input[type="hidden"]').val($(this).data('datepicker').getFormattedDate(dFormat));
      });

      $('.ui-datepicker-trigger').on('click', function () {
          $(this).closest('.form-group').find('.form-control__visible').focus();
      });

      newField.find('input').first().focus();

      i_Experiences++;
  }

  $(document).on('click', '.complex-wrapper .form-group__remove .remove', function() {
      var wrapper = $(this).closest('.complex-wrapper');
      $(this).closest('.complex-item').remove();
      if (!wrapper.find('.complex-item').length) {
          wrapper.parent().find('.form-group__add .add').click();
          wrapper.find('.complex-item').hide();
          wrapper.children().first().addClass('complex clearfix');
      }
  });

 
  var ExperiencesTemplate = $('#complexFields_Experiences .complex-item').first().clone();
</script>
@endsection