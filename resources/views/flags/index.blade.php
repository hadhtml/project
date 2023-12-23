@php
    $var_objective = "flag-impediments";
@endphp
@php
if($type == 'unit')
{
    $var_objective = "flag-impediments-unit";
}
if($type == 'stream')
{
    $var_objective = "flag-impediments-stream";
}

if($type == 'BU')
{
    $var_objective = "flag-impediments-BU";
}

if($type == 'VS')
{
    $var_objective = "flag-impediments-VS";
}

if($type == 'org')
{
    $var_objective = "flag-impediments-org";
}

if($type == 'orgT')
{
    $var_objective = "flag-impediments-orgT";
}

@endphp
@extends('components.main-layout')
@if($type == 'stream')
<title>Impediments Flags-{{$organization->value_name}}</title>
@endif
@if($type == 'unit')
<title>Impediments Flags-{{$organization->business_name}}</title>
@endif

@if($type == 'BU')
<title>Impediments Flags-{{$organization->team_title}}</title>
@endif
@if($type == 'VS')
<title>Impediments Flags-{{$organization->team_title}}</title>
@endif
@section('content')
<div id="showboards">
@if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{ session('message') }}
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div id="todo" class="col-md-4 kanban-column">
                        <div class="kanban-header bg-todo">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <div>
                                        <h4>To Do</h4>
                                        <small>Subtitle goes here</small>
                                    </div>
                                </div>
                                <div>
                                    <button onclick="toggleSearch('todo')" class="btn btn-circle text-white">
                                        <span class="material-symbols-outlined">search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light-gray shadow-none imp-parent-card">
                            <div class="card-body pt-3">
                                
                                <div class="kanban-search-bar">
                                    <input onkeyup="searchflag(this.value,'todoflag')" type="text" class="form-control input-sm" placeholder="Search...">
                                </div>
                                <div class="kanban-content" id="todoflag">
                                    @foreach($todoflag as $r)
                                        @include('flags.card')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="in-progress" class="col-md-4 kanban-column">
                        <div class="kanban-header bg-inprogress">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <div>
                                        <h4>In Progress</h4>
                                        <small>Subtitle goes here</small>
                                    </div>
                                </div>
                                <div>
                                    <button onclick="toggleSearch('in-progress')" class="btn btn-circle text-white">
                                        <span class="material-symbols-outlined">search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light-gray shadow-none imp-parent-card">
                            <div class="card-body pt-3">
                                <div class="kanban-search-bar">
                                    <input onkeyup="searchflag(this.value,'inprogress')" type="text" class="form-control input-sm" placeholder="Search...">
                                </div>
                                <div class="kanban-content"  id="inprogress">
                                    @foreach($inprogress as $r)
                                        @include('flags.card')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="done" class="col-md-4 kanban-column">
                        <div class="kanban-header bg-done">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <div>
                                        <h4>Done</h4>
                                        <small>Subtitle goes here</small>
                                    </div>
                                </div>
                                <div>
                                    <button onclick="toggleSearch('done')" class="btn btn-circle text-white">
                                        <span class="material-symbols-outlined">search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light-gray shadow-none imp-parent-card">
                            <div class="card-body pt-3">
                                <div class="kanban-search-bar">
                                    <input onkeyup="searchflag(this.value,'doneflag')" type="text" class="form-control input-sm" placeholder="Search...">
                                </div>
                                <div class="kanban-content" id="doneflag">
                                    @foreach($doneflag as $r)
                                        @include('flags.card')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
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
</script>
@endsection