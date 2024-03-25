<!-- Modal Header -->
<div class="modal-header">
  <h1 class="modal-title">From {{ DB::table('users')->where('id' , $from)->first()->name }} {{ DB::table('users')->where('id' , $from)->first()->last_name }} To {{ DB::table('users')->where('id' , $to)->first()->name }} {{ DB::table('users')->where('id' , $to)->first()->last_name }}</h1>
  <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<!-- Modal body -->
<form class="importuserdata" method="POST" action="{{ url('admin/users/importuserdata') }}">
  @csrf
  <input type="hidden" value="{{ $from }}" name="from">
  <input type="hidden" value="{{ $to }}" name="to">
<div class="modal-body">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox"></th>          
          <th>Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td><input name="module[]" value="buisness_unit" type="checkbox"></td>
            <td>Buisness Units</td>
            <td id="buisness_unit">Not Cloned</td>
          </tr>
          <tr>
            <td><input name="module[]" value="okr_mapper" type="checkbox"></td>
            <td>OKR Mapper</td>
            <td>Not Cloned</td>
          </tr>
      </tbody>
  </table>
</div>
<div class="modal-footer">
    <button class="btn btn-primary clonebutton">Start Clonning</button>
</div>
</form>
<script type="text/javascript">
  $('.importuserdata').on('submit',(function(e) {
    $('.clonebutton').html('<i class="fa fa-spin fa-spinner"></i>');
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
          // if(data == 0)
          // {
          //   alert('Please Select Atleast One Module');
            $('.clonebutton').html('Start Clonning');
          // }else{

          // }
        }
    });
}));
</script>