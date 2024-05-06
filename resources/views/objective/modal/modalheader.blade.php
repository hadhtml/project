<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header mr-4" id="create-epic">
            <img class="objectiveheaderimage" src="{{ url('public/assets/svg/objectives/one.svg') }}">@if($data->objective_name) {{ $data->objective_name }} @else Enter Objective Tittle @endif
        </h5>
    </div>
    <div class="col-md-12 displayflex">
        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" data-placeholder="Edit">
            <option></option>
            <option value="1">Remove</option>
            <option value="2">Modify</option>
            <option value="3">Select</option>
        </select>
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
