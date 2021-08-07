 @extends('layout.layout')

@section('title','Visitor Log')
 @section('content')
   <div class="col-sm-12">
    <h2 class="text-center">Visitor Log</h2>
    <div class="text-center">

    <a href="{{route('create')}}">Add Visitor</a> | <a href="{{route('index')}}">Visitor List</a>
        <div class="row text-center">
            
            <input type="text" name="from" id="from" autocomplete="off" placeholder="From date..."/> 
          
            <input type="text" name="to"  id="to" autocomplete="off" placeholder="To date..." />
     
            <input type="submit" class="btn btn-success" id="btn-search" value="Search">
            <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">Refresh</button>
        </div>
  </div>
     <div class="table-responsive">
       <table class="table table-sriped">
         <thead>
          <tr>
            <th>Sno.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Purpose</th>
            <th>CheckIn Time</th>
            <th>CheckOut Time</th>
            <th></th>
          </tr>
         </thead>

         <tbody>
           
         </tbody>
       </table>

     </div>
      
</div>
<input type="hidden" name="visitor_id" id="visitor_id" value="{{$visitor_id}}" />



   <script>
      $(function(){
        var visitor_id = $("#visitor_id").val();

      
              $.ajax({

            url: "{{route('get.visitor.log')}}",
            
            dataType:"json",
            data:{visitor_id:visitor_id}
         
      }).done(function(response){
           if (response.exit_code == '0'){
                var html = "";
                var sno = 1;
               response.data.forEach(function(item, index){
                
                    html += '<tr>';
                     html += '<td>'+sno+'</td>';
                    html += '<td>'+item.first_name+'</td>';
                    html += '<td>'+item.last_name+'</td>';
                    html += '<td>'+item.phone_no+'</td>';
                    html += '<td>'+item.address+'</td>';
                    html += '<td>'+item.purpose+'</td>';
                    html += '<td>'+item.check_in+'</td>';
                    html += '<td>';
                    if (item.check_out == null){
                      html += '--';
                    } else {
                       html += item.check_out;
                    }

                    html +='</td>';

                    html += '<td>';
                    
                    if (item.check_out == null){
                      html += '<a onclick="checkout('+item.id+');" class="btn btn-info btn-sm">Check Out</a>';
                    } 

                    html += '</td>';

                    html += '</tr>';
                    sno++;
               });
             } else {
               html +='<tr><td colspan="7"><span class="text-danger">No record found!</span></td></tr>';
             }
             
             $("tbody").html(html);

           
            

      }).fail(function( jqXHR,  textStatus, errorThrown){
        
          alert(jqXHR.responseJSON.error);
      });
      });
    </script>

    <script type="text/javascript">
        $(function () {
            $("#from").datepicker({
              
                onSelect: function (selected) {
                    
                    $("#to").datepicker("option", "minDate", selected);
                }
            });
            $("#to").datepicker({
             
                onSelect: function (selected) {
                 
                    $("#from").datepicker("option", "maxDate");
                }
            });
        });
    </script>

     <script>
      $(function(){
         $("#btn-search").click(function(e){
              e.preventDefault();
             var visitor_id = $("#visitor_id").val();
             var from = $("#from").val();
             var to = $("#to").val();

              $.ajax({

            url: "{{route('visitor.log.seacrh')}}",
            
            dataType:"json",
            data:{visitor_id:visitor_id,from:from,to:to}
         
      }).done(function(response){
           if (response.exit_code == '0'){
                var html = "";
                var sno = 1;
               response.data.forEach(function(item, index){
                
                    html += '<tr>';
                     html += '<td>'+sno+'</td>';
                    html += '<td>'+item.first_name+'</td>';
                    html += '<td>'+item.last_name+'</td>';
                    html += '<td>'+item.phone_no+'</td>';
                    html += '<td>'+item.address+'</td>';
                    html += '<td>'+item.purpose+'</td>';
                    html += '<td>'+item.check_in+'</td>';
                    html += '<td>';
                    if (item.check_out == null){
                      html += '--';
                    } else {
                       html += item.check_out;
                    }

                    html +='</td>';

                    if (item.check_out == null){
                      html += '<td><a class="btn btn-info btn-sm">Check Out</a></td>';
                    } 
                    html += '</tr>';
                    sno++;
               });
             } else {
               html +='<tr><td colspan="7"><span class="text-danger">No record found!</span></td></tr>';
             }
             
             $("tbody").html(html);

           
            

      }).fail(function( jqXHR,  textStatus, errorThrown){
        
          alert(textStatus);
      });
          });
       
      });
    </script>

        <script>
      function refreshPage(){
          window.location.reload();
      } 
</script>

<script>
  function checkout(id){

         if (!confirm('Do yoy want to check out?')){
          return false;
         }

         var log_id = id;

            $.ajax({

            url: "{{route('visitor.checkout')}}",
            
            dataType:"json",
            type:'post',
            data:{log_id:log_id}
           
         
      }).done(function(response){
           alert(response.message);
           location.reload();
             
      }).fail(function( jqXHR,  textStatus, errorThrown){
        
          alert(textStatus);
      });

  }
</script>

  
@endsection

