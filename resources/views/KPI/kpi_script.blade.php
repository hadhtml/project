<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>

    </script>
<script>
        function saveChartKpi()
        {
   
        var title = $('#title').val(); 
        var t_value = $('#t_value').val();
        var symbol = $('#symbol').val(); 
        var t_date = $('#t_date').val();
        
        var lead_manager = $('#lead_manager').val(); 
        var summary = $('#summary').val();
        var type = "{{ $organization->type }}";
        var unit_id = "{{ $organization->id }}";
        
        
       
        $.ajax({
        type: "POST",
        url: "{{ url('add-chart-kpi') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        title:title,
        t_value:t_value,
        t_date:t_date,
        symbol:symbol,
        lead_manager:lead_manager,
        summary:summary,
        type:type,
        unit_id:unit_id,

       
       
      

        },
        success: function(res) {
             
                
              $('#success-chart').html('<div class="alert alert-success" role="alert"> Data Upload successfully</div>');
              $('#chart-feild-error').html('');
              setTimeout(function() { 
                $('#create-chart').modal('hide');
                $('#success-chart').html('');

                location.reload();
            }, 3000);
              
             
            
            }
    });
    
   

        }


                function onlyNumberKey(evt) 
                {
                  
                 var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                 if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                 return false;
                 return true;
                } 


    function editkpichart(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('dashboard/getkpicheckin') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
            },
            success: function(res) {
                $('#kpi-modal-content').html(res);
                $('#edit-kpi-modal-new').modal('show');
            }
        });
    }









  



        
        
        
 
</script>

