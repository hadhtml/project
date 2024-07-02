<div class="row positionrelative">
    <div class="col-md-10">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty pb-5" id="create-epic">
            <img src="{{ url('public/assets/svg/keyresult.svg') }}">@if($data->key_name) {{ $data->key_name }} @else Enter Key Result Tittle @endif
        </h5>
        <div class="btn-group epicheaderborderleft">
            <button type="button" class="btn btn-default statuschangebutton @if($data->key_status == 'To Do') todo-button-color @endif @if($data->key_status == 'In progress') inprogress-button-color @endif @if($data->key_status == 'Done') done-button-color @endif" id="showboardbutton">
                @if($data->key_status == 'To Do')
                    To Do
                @endif
                @if($data->key_status == 'In progress')
                    In Progress
                @endif
                @if($data->key_status == 'Done')
                    Done
                @endif
            </button>
            <button type="button" class="@if($data->key_status == 'To Do') todo-button-color @endif @if($data->key_status == 'In progress') inprogress-button-color @endif @if($data->key_status == 'Done') done-button-color @endif statuschangebuttonarrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">   
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                @if($data->key_status == 'To Do')
                    <a class="dropdown-item" onclick="changekeyresultstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                    <a class="dropdown-item" onclick="changekeyresultstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->key_status == 'In progress')
                    <a class="dropdown-item" onclick="changekeyresultstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changekeyresultstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->key_status == 'Done')
                    <a class="dropdown-item" onclick="changekeyresultstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changekeyresultstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2 text-right">
        <div class="action ml-0">
            <button onclick="maximizemodal()" id="open_in_full" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">open_in_full</span>
            </button>
            <button onclick="maximizemodal()" id="close_fullscreen" class="d-none btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">close_fullscreen</span>
            </button>
            <button data-bs-dismiss="modal" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>    
        <br>
        @if($data->key_name)
        <h1 class="epic-percentage">{{ $data->key_prog }} % Completed</h1>
        @endif
    </div>
</div>
<script type="text/javascript">
    function rasiseflag() {
        $('.raiseflag-box').slideToggle();
    }
    function changekeyresultstatus(status , id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/changekeyresultstatus') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                id: id,
            },
            success: function(res) {
                $('.modalheaderforapend').html(res);
            },
            error: function(error) {
                
            }
        });
    }
</script>