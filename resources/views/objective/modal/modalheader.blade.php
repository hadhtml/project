<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header mr-4" id="create-epic">
            <img class="objectiveheaderimage" src="{{ url('public/assets/svg/objectives/one.svg') }}">@if($data->objective_name) {{ $data->objective_name }} @else Enter Objective Tittle @endif
        </h5>
    </div>
    <div class="col-md-12 displayflex">
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
        <div class="moverightside">
            
        </div>
    </div>
</div>
<div class="rightside" >
    <span onclick="maximizemodal()" id="open_in_full">
        <span class="material-symbols-outlined">open_in_full</span>
    </span>
    <span onclick="maximizemodal()" class="d-none" id="close_fullscreen">
        <span class="material-symbols-outlined">close_fullscreen</span>
    </span>
    <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{url('public/assets/svg/cross.svg')}}">
    <br>
    <h1 class="epic-percentage objectivepercentage">{{ $data->obj_prog }} % Completed</h1>
</div>
