@if($data->epic_start_date)
<a href="javascript:void(0)" class="epic-datepicker" id="showboardbutton">
    <img src="{{url('public/assets/svg/note-text.svg')}}" width="20">
    <input readonly type="text" name="daterange" value="{{ date('m/d/Y', strtotime($data->epic_start_date)) }} - {{ date('m/d/Y', strtotime($data->epic_end_date)) }}" />
</a>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'right'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epics/changeepicdate') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            epic_id:'{{ $data->id }}',
            start:start.format('YYYY-MM-DD'),
            end:end.format('YYYY-MM-DD'),
        },
        success: function(res) {
            var modaltab = $('#modaltab').val();
            if(modaltab == 'general')
            {
                editepic('{{ $data->id }}');
            }
        },
        error: function(error) {
            
        }
    });
  });
});
</script>
@endif