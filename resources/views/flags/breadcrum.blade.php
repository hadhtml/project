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
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            @if($flagtype == 'Impediment')
            <span class="material-symbols-outlined">warning_off</span>
            @endif
            @if($flagtype == 'Risk')
            <span class="material-symbols-outlined">emergency</span>
            @endif
            @if($flagtype == 'Blocker')
            <span class="material-symbols-outlined">block</span>
            @endif
            @if($flagtype == 'Action')
            <span class="material-symbols-outlined">call_to_action</span>
            @endif
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ $flagtype }}
            </h1>
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('organization/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @if($type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
            @if($type == 'stream')
            @php
                $unit  = DB::table('business_units')->where('id' , $organization->unit_id)->first();
            @endphp
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
            @if($type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">groups</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
            @if($type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" class="text-muted text-hover-primary">{{$Unit->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">groups</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
            @if($type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">groups</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
            @if($type == 'org')
            <li class="breadcrumb-item text-muted">
                @if($flagtype == 'Impediment')
                <span class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtype == 'Risk')
                <span class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtype == 'Blocker')
                <span class="material-symbols-outlined">block</span>
                @endif
                @if($flagtype == 'Action')
                <span class="material-symbols-outlined">call_to_action</span>
                @endif
                {{ $flagtype }}
            </li>
            @endif
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="showboardbutton">View All <i class="ki-outline ki-down fs-2 me-0"></i></a>
         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
            <div class="menu-item px-5">
               <a class="menu-link px-5" href="javascript:void(0)" onclick="viewboards('archived')">Archived</a>
            </div>
            <div class="menu-item px-5">
               <a class="menu-link px-5" href="javascript:void(0)" onclick="viewboards('all')">View All</a>
            </div>
         </div>
        <button onclick="addnewflag({{ $organization->id }} , '{{$organization->type}}' , '{{ $flagtype }}')" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Add New</button>
        <input id="viewboards" value="all" type="hidden" name="">
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
                $('#showboardbutton').html('View All <i class="ki-outline ki-down fs-2 me-0"></i>');
                $('#viewboards').val('all')
            }
            if(id == 'archived')
            {
                $('#showboardbutton').html('Archived <i class="ki-outline ki-down fs-2 me-0"></i>');
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