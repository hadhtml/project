
@php
if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
}

if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();
$Unit  = DB::table('business_units')->where('id',$team->unit_id)->first();  

}

if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}

@endphp

<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
         
          
            <div class="d-flex flex-row">

                <div>
                    @if($flagtype == 'Impediment')
                    <span style="font-size:22px" class="material-symbols-outlined">warning_off</span>
                    @endif
                    @if($flagtype == 'Risk')
                    <span style="font-size:22px" class="material-symbols-outlined">emergency</span>
                    @endif
                    @if($flagtype == 'Blocker')
                    <span style="font-size:22px" class="material-symbols-outlined">block</span>
                    @endif
                    @if($flagtype == 'Action')
                    <span style="font-size:22px" class="material-symbols-outlined">call_to_action</span>
                    @endif

                </div>
                <div>
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        {{ $flagtype }}
                    </h5>
                </div>
            </div>
            <!-- Breadcrum Items -->
           <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a style="text-decoration: none;" href="{{ route('organization.dashboard') }}">Dashboard</a>
                        </div>
                    </div>
                </div>
                @if($type == 'unit')
                {{-- <div class="mr-2">
                    <a style="text-decoration: none;" href="{{ route('organization.level-one', Cmf::getmoduleslug('level_one')) }}">
                        Buisness Units
                    </a>
                </div> --}}
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                        </div>
                    </div>
                    
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif
                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>
                        </div>
                    </div>
                </div>
                @endif
                @if($type == 'stream')
                @php
                    $unit  = DB::table('business_units')->where('id' , $organization->unit_id)->first();
                @endphp
                <div class="mr-2">
                    @if($organization->type == 'stream')
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif
                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>
                        </div>
                    </div>
                </div>
                @endif
                @if($type == 'BU')
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif
                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>
                        </div>
                    </div>
                </div>
                @endif

                @if($type == 'VS')
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" style="text-decoration: none;" >{{$Unit->business_name}}</a>
                        </div>
                    </div>
      
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->value_name}}</a>
                        </div>
                    </div>
       
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>                        
                        </div>
                    </div>
            
                 
                </div>
                @endif

                @if($type == 'orgT')
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">home</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif
                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>
                        </div>
                    </div>
                </div>
                @endif

                @if($type == 'org')
                {{-- @if($organization->type == 'org')
                <div class="mr-2">  
                <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
                </div>
                @endif --}}
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($flagtype == 'Impediment')
                            <span style="font-size:17px" class="material-symbols-outlined">warning_off</span>
                            @endif
                            @if($flagtype == 'Risk')
                            <span style="font-size:17px" class="material-symbols-outlined">emergency</span>
                            @endif
                            @if($flagtype == 'Blocker')
                            <span style="font-size:17px" class="material-symbols-outlined">block</span>
                            @endif
                            @if($flagtype == 'Action')
                            <span style="font-size:17px" class="material-symbols-outlined">call_to_action</span>
                            @endif
                        </div>
                        <div>
                            <p>{{ $flagtype }} </p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!--End Breadcrum Items -->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center toolbar">
            @if($type == 'unit')
            <div class="d-flex flex-row organization-drop align-items-center">
                <div class="d-flex flex-column mr-3">
                    <div>
                        Team
                        <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                            <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                        </select>
                        <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="getflagsbyteam();" >
                           <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                        </button>
                    </div>
                </div>
            </div>
            @endif
            @if($type == 'stream')
            <div class="d-flex flex-row organization-drop align-items-center">
                <div class="d-flex flex-column mr-3">
                    <div>
                        Team
                        <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                            <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                        </select>
                        <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="getflagsbyteam();" >
                           <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                        </button>
                    </div>
                </div>
            </div>
            @endif
            @if($type == 'org')
            <div class="d-flex flex-row organization-drop align-items-center">
                <div class="d-flex flex-column mr-3">
                    <div>
                        Team
                        <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                            <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                        </select>
                        <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="getflagsbyteam();" >
                           <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <div>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" style="border-top-right-radius:0px !important; border-bottom-right-radius:0px !important; padding-right: 0px !important; min-width: 80px !important; padding-left: 0px !important;" id="showboardbutton">View All</button>
                  <button type="button" style="padding-right: 5px !important;" class="btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" style=""  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{url('public/assets/images/icons/angle-down.svg')}}" width="17">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewboards('all')">View All</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="viewboards('archived')">Archived</a>
                  </div>
                </div>
                <button onclick="addnewflag({{ $organization->id }} , '{{$organization->type}}' , '{{ $flagtype }}')" class="button">Add New</button>
                <input id="viewboards" value="all" type="hidden" name="">
            </div>
        </div>
    </div>
</div>
<div class="modal" id="edit-epic" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modaldialog" role="document">
        <div class="modal-content newmodalcontent" id="newmodalcontent">
            
        </div>
    </div>
</div>
<div class="modal fade" id="deleteflagmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Impediments Flag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="deleteflagform" action="{{ url('dashboard/flags/deleteflag') }}">
             @csrf   
            <input type="hidden" name="delete_id" id="deleteid">
            <div class="modal-body">
                Are you sure you want to Delete this Impediments Flag?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" id="deleteflagbutton" class="btn btn-danger btn-sm">Confirm</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!-- MDB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dragula@3.7.3/dist/dragula.min.js"></script>
<script>
function addnewflag(id,type,flag_type) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/createimpediment') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            type:type,
            flag_type:flag_type
        },
        success: function(res) {
            viewboards($('#viewboards').val());
            editflag(res);
        }
    });
}
function showmemberbox() {
    $('.memberadd-box').slideToggle();
}
function escalateflag(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/escalateflag') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            viewboards($('#viewboards').val());
            $('#escalateflag').html('<span class="material-symbols-outlined"> escalator </span> Escalated')
        }
    });
}
function showepicdetails(id) {
    if(id == '')
    {
        $('#epicresult').html('')
    }
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/showepicdetail') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            $('#epicresult').html(res.message)
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
function loadmoretext(x){
    const toggleButton = document.getElementById("toggle-button-text" + x);
    const moreContent = document.getElementById("show-read-more" + x);
    const LoadmoreContent = document.getElementById("show-read" + x);
    toggleButton.addEventListener("click", function () {    
        $('#show-read-more' + x).show();
        $('#show-read' + x).hide();    
        
    });
}
function seelesstext(x){
    const toggleButton = document.getElementById("toggle-button-less-text" + x);
    const moreContent = document.getElementById("show-read-more" + x);
    const LoadmoreContent = document.getElementById("show-read" + x);
    toggleButton.addEventListener("click", function () {
        $('#show-read-more' + x).hide();
        $('#show-read' + x).show();
    });
}
var drakeflags = dragula([
    document.getElementById('todoflag'), 
    document.getElementById('inprogress'), 
    document.getElementById('doneflag')
]);


drakeflags.on("drop", function (el, target, source, sibling) {
    var parentElId = target.id;
    var droppedElId = el.id;
    // Perform additional operations or AJAX request here
    // Example: Update the position of the card using AJAX
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/change-flag-status') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            parentElId:parentElId,
            droppedElId:droppedElId,
        },
        success: function(response) {
            console.log('Card position updated successfully.');
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
});

function toggleSearch(columnId) {
    var searchBar = document.getElementById(columnId).getElementsByClassName('kanban-search-bar')[0];
    searchBar.classList.toggle('kanban-search-bar-expanded');
}
function searchflag(value,id) {
    var organization = '{{ $organization->id }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/searchflag') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            value:value,
            id:id,
            organization_id:organization,
        },
        success: function(res) {
            $('#'+id).html(res);
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
function editflag(id) {
    var new_url="{{ url()->current() }}?flag="+id;
    window.history.pushState("data","Title",new_url);
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/getflagmodal') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            $('#newmodalcontent').html(res);
            $('#edit-epic').modal('show');
            showtab(id , 'general');
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
function archiveflag(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/archiveflag') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            viewboards($('#viewboards').val());
            $('#edit-epic').modal('hide');
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
function unarchiveflag(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/unarchiveflag') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            viewboards($('#viewboards').val());
            editflag(id);
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
function deleteflag(id) {
    $('#deleteid').val(id);
    $('#deleteflagmodal').modal('show');
}
$('#deleteflagform').on('submit',(function(e) {
    $('#deleteflagbutton').html('<i class="fa fa-spin fa-spinner"></i>');
    e.preventDefault();
    var value = $('#deleteid').val();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            $('#deleteflagbutton').html('Confirm');
            $('#'+value).remove();
            $('#deleteflagmodal').modal('hide');
        }
    });
}));
function viewboards(id) {
    var slug = '{{ $organization->slug }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/viewboards') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            slug:slug,
            type:'{{ $type }}',
            flagtype:'{{ $flagtype }}',
        },
        success: function(res) {
            if(id == 'all')
            {
                $('#showboardbutton').html('<img src="{{url("public/assets/images/icons/filter.svg")}}" width="20"> View All');
                $('#viewboards').val('all')
            }
            if(id == 'archived')
            {
                $('#showboardbutton').html('<img src="{{url("public/assets/images/icons/filter.svg")}}" width="20"> Archived');
                $('#viewboards').val('archived')
            }
           $('#showboards').html(res);
        },
        error: function(error) {
            
        }
    });
}
$(document).ready(function() {
    $('#epics').select2({
        width: '100%'
    });
    @if(isset($_GET['flag']))
        editflag("{{ $_GET['flag'] }}")
    @endif
    $("#edit-epic").on('hidden.bs.modal', function(){
       deletenullobject('flags');
       var new_url="{{ url()->current() }}";
       window.history.pushState("data","Title",new_url);
    });
});
function deletenullobject(type) {
    $.ajax({
        type: "POST",
        url: "{{ url('deletenullobject') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            type: type,
        },
        success: function(res) {
            
        }
    });
}
function searchepic(id) {
    var type = '{{ $type }}';
    var organizationid = '{{ $organization->slug }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/searchepic') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            type:type,
            organizationid:organizationid,
        },
        success: function(res) {
            if(id == '')
            {
                $('.searchepic-box').hide();
            }else{
                $('.searchepic-box').show();
                $('.searchepic-box').html(res);
            }
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}
</script>