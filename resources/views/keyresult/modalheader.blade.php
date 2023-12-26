<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/keyresult.svg') }}">{{ $data->key_name }}
        </h5>
    </div>
    <div class="col-md-12 displayflex">
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
                    <a class="dropdown-item" onclick="changeflagstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                    <a class="dropdown-item" onclick="changeflagstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->key_status == 'In progress')
                    <a class="dropdown-item" onclick="changeflagstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeflagstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->key_status == 'Done')
                    <a class="dropdown-item" onclick="changeflagstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeflagstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                @endif
            </div>
        </div>
        <div class="moverightside">
            <h1 class="epic-percentage">{{ $data->key_prog }} % Completed</h1>
        </div>
    </div>
</div>
<div class="rightside" >
    <span onclick="maximizemodal()">
        <img  src="{{url('public/assets/svg/maximize.svg')}}">
    </span>
    <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{url('public/assets/svg/cross.svg')}}">
</div>
<script type="text/javascript">
    function rasiseflag() {
        $('.raiseflag-box').slideToggle();
    }
    function maximizemodal() {
        $('#modaldialog').toggleClass('modalfullscreen')
        $('#edit-epic-modal-new').css('padding-right' , '0px')
    }
</script>