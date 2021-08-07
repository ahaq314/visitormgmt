 @extends('layout.layout')

@section('title','Visitor List')
 @section('content')
   <div class="col-sm-12">
    <h2 class="text-center">Visitor List</h2>
    <span style="float:right;"><a href="{{route('create')}}">Add Visitor</a></span>
    <div class="text-center">
    <input type="text" name="search" id="search" placeholder="Search by phone, name..." /><button class="btn btn-info btn-sm" id="btn-search">Search</button>
    <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">Refresh</button>

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
            <th>&nbsp;</th>
           
          </tr>
         </thead>

         <tbody>
           
         </tbody>
       </table>

     </div>
      
</div>




   <script>
      $(function(){
            $.ajax({

            url: "{{route('visitor.list')}}",
            
            dataType:"json"

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

                    html += '<td><a href="/visitor_log?vid='+item.id+'" class="btn btn-info btn-sm">View Logs</a></td>';
                    
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

     <script>
      $(function(){
        $("#btn-search").click(function(e){
           e.preventDefault();
         var keyword = $("#search").val().trim();

            if (keyword == ''){
              alert('Enter keyword to search...');
              return false;
            }

           $.ajax({

            url: "{{route('visitor.seacrh')}}",
            
            dataType:"json",

            data:{keyword:keyword}

      }).done(function(response){

           if (response.exit_code == '0'){
                var html = "";

               response.data.forEach(function(item, index){
                         
                    html += '<tr>';
                    html += '<td>'+item.first_name+'</td>';
                    html += '<td>'+item.last_name+'</td>';
                    html += '<td>'+item.phone_no+'</td>';
                    html += '<td>'+item.address+'</td>';

                    html += '<td><a href="/visitor_log?vid='+item.id+'" class="btn btn-info btn-sm">View Logs</a></td>';
                    
                    html += '</tr>';
               });
             } else {
               html +='<tr><td colspan="7"><span class="text-danger">No record found!</span></td></tr>';
             }
             
            

             $("tbody").html(html);

           
            

      }).fail(function( jqXHR,  textStatus, errorThrown){
        
          alert(jqXHR.responseJSON.error);
      });
        });
             
      });
    </script>
    <script>
      function refreshPage(){
          window.location.reload();
      } 
</script>

@endsection

