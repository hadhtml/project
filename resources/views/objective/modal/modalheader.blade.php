<div class="row positionrelative">
    <div class="col-md-10">
        <h5 class="modal-title newmodaltittle epic-tittle-header mr-4 pb-5" id="create-epic">
            <img class="objectiveheaderimage" src="{{ url('public/assets/svg/objectives/one.svg') }}">@if($data->objective_name) {{ $data->objective_name }} @else Enter Objective Tittle @endif
        </h5>
        <div class="btn-group epicheaderborderleft">
            <button type="button" class="btn btn-default statuschangebutton @if($data->status == 'To Do') todo-button-color @endif @if($data->status == 'In progress') inprogress-button-color @endif @if($data->status == 'Done') done-button-color @endif" id="showboardbutton">
                @if($data->status == 'To Do')
                    To Do
                @endif
                @if($data->status == 'In progress')
                    In Progress
                @endif
                @if($data->status == 'Done')
                    Done
                @endif
            </button>
            <button type="button" class="@if($data->status == 'To Do') todo-button-color @endif @if($data->status == 'In progress') inprogress-button-color @endif @if($data->status == 'Done') done-button-color @endif statuschangebuttonarrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">         
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                @if($data->status == 'To Do')
                    <a class="dropdown-item" onclick="changeobjectivestatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                    <a class="dropdown-item" onclick="changeobjectivestatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->status == 'In progress')
                    <a class="dropdown-item" onclick="changeobjectivestatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeobjectivestatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->status == 'Done')
                    <a class="dropdown-item" onclick="changeobjectivestatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeobjectivestatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
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
        <h1 class="epic-percentage">{{ $data->obj_prog }} % Completed</h1>
    </div>
</div>
