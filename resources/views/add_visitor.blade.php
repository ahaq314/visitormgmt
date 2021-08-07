 @extends('layout.layout')

@section('title','Add Visitor')
 @section('content')
  <div class="col-sm-2"></div>
 <div class="col-sm-8">
    <h2 class="text-center">Add Visitor</h2>
    <div class="text-center">
      <a href="{{route('index')}}">Visitor List</a>
    </div>
      <form id="visitor-form" autocomplete="off">

          <label for="last_name">Phone No.</label>
            <div class="form-group">
               <input type="text" class="form-control" required placeholder="Phone No..."  name="phone_no" id="phone_no" />
            </div>


            <label for="first_name">First Name</label>
            <div class="form-group">
               <input type="text" class="form-control" required placeholder="First Name..."  name="first_name" id="first_name" />
            </div>


            <label for="last_name">Last Name</label>
            <div class="form-group">
               <input type="text" class="form-control" required placeholder="Last Name..."  name="last_name" id="last_name" />
            </div>

          

            <label for="address">Address</label>
            <div class="form-group">
    <textarea class="form-control" required placeholder="Address..."  name="address" id="address" /></textarea>
            </div>

             <label for="address">Purpose</label>
            <div class="form-group">
    <textarea class="form-control" required placeholder="Purpose of visit..."  name="purpose" id="purpose" /></textarea>
            </div>
         
          <button class="btn btn-primary btn-sm" id="btn-add">Add</button>
          &nbsp;&nbsp; <button type="reset" class="btn btn-default btn-sm" id="btn-add">Reset</button>
      </form>
</div>

  <div class="col-sm-2"></div>
  <script>
      $(function(){
            $("#phone_no").keyup(function(e){
                e.preventDefault();
         
                var phone_no = $("#phone_no").val().trim();
      
                if (phone_no.length < 5){

                  return false;
                }
                
                $.ajax({

                      url: "{{route('visitor.exist')}}",
                      data:{phone_no:phone_no},
                      dataType:"json",
                      beforeSend:function(){
                        $("#btn-add").prop("disabled",true).text("Wait...");
                      },
                      complete: function(){
                        $("#btn-add").prop("disabled",false).text("Add");
                      }

                }).done(function(response){

                      if (response.exit_code == '0'){
                          $("#first_name").val(response.data.first_name);
                          $("#last_name").val(response.data.last_name);
                          $("#address").val(response.data.address);
                      }
                      else {
                          $("#first_name").val('');
                          $("#last_name").val('');
                          $("#address").val(''); 
                      }
                     
                }).fail(function( jqXHR,  textStatus, errorThrown){
                  
                    console(jqXHR.responseJSON.error);
                });


            });
      });
    </script>


   <script>
      $(function(){
            $("#btn-add").click(function(e){
                e.preventDefault();
            
                var first_name = $("#first_name").val().trim();
                var last_name = $("#last_name").val().trim();
                var phone_no = $("#phone_no").val().trim();
                var address = $("#address").val().trim();
                var purpose = $("#purpose").val().trim();
           
              
                $.ajax({

                      url: "{{route('visitor.store')}}",
                      data:{first_name:first_name, last_name:last_name,phone_no:phone_no,address:address,"_token": "{{ csrf_token() }}",purpose:purpose},
                      dataType:"json",
                      type:"post",
                      beforeSend:function(){
                        $("#btn-add").prop("disabled",true).text("Wait...");
                      },
                      complete: function(){
                        $("#btn-add").prop("disabled",false).text("Add");
                      }

                }).done(function(response){
                     if (response.exit_code == '0'){
                 
                        $("#visitor-form")[0].reset();

                     }
                      alert(response.message);

                }).fail(function( jqXHR,  textStatus, errorThrown){
                  
                    alert(jqXHR.responseJSON.error);
                });


            });
      });
    </script>
    
    <script>
    $(function(){
         $( "#datepicker" ).datepicker({
        dateFormat: "dd-mm-yy"
     });
     });
    </script>
@endsection

