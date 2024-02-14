<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">person_check</span>
                </div>
                <div>
                    <h4>Asign</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="needs-validation" action="{{ url('assign-teambacklog-epic') }}" method="POST">
   @csrf
   <input type="hidden" name="backlog_id" value="{{ $data->id }}">
   <input type="hidden" name="team_type" value="{{ $data->type }}">
   <div class="row">
      @if ($data->type == 'BU')

      @php 
      $stream  = DB::table('unit_team')->where('id',$data->unit_id)->first();
      $streamTeam  = DB::table('business_units')->where('id',$stream->org_id)->first();
      @endphp
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Team</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select Business Team</option>
               @foreach(DB::table('unit_team')->where('org_id',$streamTeam->id)->get() as $r)
               <option value="{{ $r->id }}">{{ $r->team_title }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif
      @if ($data->type == 'VS')
      @php 
      $stream  = DB::table('value_team')->where('id',$data->unit_id)->first();
      $streamTeam  = DB::table('value_stream')->where('id',$stream->org_id)->first();

      @endphp
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Team</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select Value Team</option>
               @foreach(DB::table('value_team')->where('org_id',$streamTeam->id)->get() as $r)
             
               <option value="{{ $r->id }}">{{ $r->team_title }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif
      @if ($data->type == 'org')
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Organization</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select Organization </option>
               @foreach(DB::table('organization')->where('id',$data->unit_id)->get() as $r)
               <option value="{{ $r->id }}">{{ $r->organization_name }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif
      @if ($data->type == 'orgT')
      @php 
      $stream  = DB::table('org_team')->where('id',$data->unit_id)->first();
      $streamTeam  = DB::table('organization')->where('id',$stream->org_id)->first();

      @endphp
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Team</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select Organization Team </option>
               @foreach(DB::table('org_team')->where('org_id',$streamTeam->id)->get() as $r)
               <option value="{{ $r->id }}">{{ $r->team_title }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif

      @if ($data->type == 'unit')
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose {{ Cmf::getmodulename("level_one") }}</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select {{ Cmf::getmodulename("level_one") }}</option>
               @foreach(DB::table('business_units')->where('id',$data->unit_id)->get() as $r)
               <option value="{{ $r->id }}">{{ $r->business_name }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif

      @if ($data->type == 'stream')
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Value Stream</label>
            <select class="form-control category" id="" name="stream_obj" required>
               <option value="">Select Value Stream</option>
               @foreach(DB::table('value_stream')->where('id',$data->unit_id)->get() as $r)
               <option value="{{ $r->id }}">{{ $r->value_name }}</option>
               @endforeach
            </select>
         </div>
      </div>
      @endif
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Objective</label>
            <select name="locstate" id="" onchange="getvaluekey(this.value)" class="form-control obj" value="" required>

            </select>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">Choose Key Result</label>
            <select name="lockey" id="" onchange="getvalueintit(this.value)" class="form-control key" value="" required>
            </select>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description" style="bottom:72px;">Choose initiative</label>
            <select name="locinit" id="" class="form-control init" required>
            </select>
            
         </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-6">
         <div class="form-group mb-0">
            <label for="start-date">Start Date</label>
            <input type="date" class="form-control" name="start_date[]" @if ($data->epic_start_date) value="{{ $data->epic_start_date }}" @else value="{{ date('Y-m-d') }}" @endif min="{{ date('Y-m-d') }}"  required>
         </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-6">
         <div class="form-group mb-0">
            <label for="start-date">End Date</label>
            <input type="date" class="form-control" name="end_date[]" @if ($data->epic_end_date) value="{{ $data->epic_end_date }}" @else value="{{ date('Y-m-d') }}" @endif min="{{ date('Y-m-d') }}" required>
            
         </div>
      </div>
   </div>
   <div class="row margintopfourtypixel">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">Assign Epics</button>
        </div>
    </div>
</form>
<script type="text/javascript">
       $('.category').on('change', function() {
       var id = $(this).val();
       var type = "{{ $data->type }}";
       if (id) {
           $.ajax({
               type: "GET",
               url: "{{ url('get-value-obj') }}",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data: {
                   id: id,
                   type: type,
               },
               success: function(res) {
   
                   if (res) {
                       $('.obj').empty();
                       $('.obj').append('<option hidden>Choose Objective</option>');
                       $.each(res, function(key, course) {
                           $('select[name="locstate"]').append('<option value="' + course
                               .id + '">' + course.objective_name + '</option>');
                       });
                   } else {
                       $('.obj').empty();
   
                   }
   
               }
           });
       } else {
           $('.init').empty();
           $('.key').empty();
           $('.obj').empty();
       }
   
   });
   
   
   
   function getvaluekey(id) {
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-value-key') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
           },
           success: function(res) {
   
               if (res) {
                   $('.key').empty();
                   $('.key').append('<option hidden>Choose Key Result</option>');
                   $.each(res, function(key, course) {
                       $('select[name="lockey"]').append('<option value="' + course.id + '">' +
                           course.key_name + '</option>');
                   });
               } else {
                   $('.key').empty();
               }
   
           }
       });
   
   }
   
   function getvalueintit(id) {
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-value-init') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
           },
           success: function(res) {
   
               if (res) {
                   $('.init').empty();
                   $('.init').append('<option hidden value="">Choose initiative</option>');
                   $.each(res, function(key, course) {
                       $('select[name="locinit"]').append('<option value="' + course.id + '">' +
                           course.initiative_name + '</option>');
                   });
               } else {
                   $('.init').empty();
               }
   
           }
       });
   
   }
   
   function assign_epic_unit(val) {
   
       var id = "{{ $data->unit_id }}";
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-assign-epic-unit') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
               slug: slug,
               val: val
           },
           success: function(res) {
   
               $('#olddata').html(res);
   
   
           }
       });
   
   }
</script>