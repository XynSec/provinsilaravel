<!DOCTYPE html>
<html>
   <head>
   <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Buat Manggil Bootstrapnya -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>
   <body>
  
     <!-- Provinsi Dropdown -->
     Provinsi : <select class="dropdown-item" id='sel_prov' name='sel_prov'>
       <option  value='0'>-- Select Provinsi --</option>

       <!-- Read Provinsi -->
       @foreach($provinsiData['data'] as $provinsi)
         <option  value='{{ $provinsi->id }}'>{{ $provinsi->provinsi }}</option>
       @endforeach

    </select>

    <br><br>
    <!-- Provinsi Kota Dropdown -->
    Kota : <select class="dropdown-item" id='sel_kot' name='sel_kot'>
       <option value='0'>-- Select Kota --</option>
    </select>

    <!-- Script -->
    <script type='text/javascript'>

    $(document).ready(function(){

      // Department Change
      $('#sel_prov').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#sel_kot').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
           url: 'getKotas/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['data'][i].id;
                 var kota = response['data'][i].kota;

                 var option = "<option value='"+id+"'>"+kota+"</option>"; 

                 $("#sel_kot").append(option); 
               }
             }

           }
        });
      });

    });

    </script>
  </body>
</html>