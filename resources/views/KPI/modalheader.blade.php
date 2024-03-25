<div class="row positionrelative">
    <div class="col-md-12 mb-2">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            {{ $data->title }}
        </h5>
    </div>
    <div class="col-md-12 displayflex">
        <div class="epic_id mr-3 mt-1">
            @foreach (DB::table('members')->get() as $r)
                @if ($r->id == $data->lead_id)
                    <div class="ml-2">
                        @if ($r->image != null)
                            <img src="{{ asset('public/assets/images/' . $r->image) }}" width="25" height="25"
                                alt="lead">
                        @else
                            <img src="{{ Avatar::create($r->name . ' ' . $r->last_name)->toBase64() }}" width="25"
                                height="25" alt="lead">
                        @endif
                        <span>{{ $r->name }} {{ $r->last_name }}</span>
                    </div>
                @endif
            @endforeach
        </div>





        <div class="d-flex justify-content-between">
            <div class="epic-header-buttons raise-flag-button">
                <a href="javascript:void(0)" id="showboardbutton">
                    <img src="{{ url('public/assets/svg/btnflagsvg.svg') }}" width="20"> Flag @if (DB::table('flags')->where('epic_id', $data->id)->count() > 0)
                        ({{ DB::table('flags')->where('flag_title', '!=', null)->where('epic_id', $data->id)->count() }})
                    @endif
                </a>
                <div class="raiseflag-box hidepopupall">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Flag</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <img onclick="rasiseflag()" class="memberclose"
                                src="{{ url('public/assets/svg/memberclose.svg') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="needs-validation" action="#" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" id="flag_epic_id">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Flag Type <small
                                                    class="text-danger">*</small></label>
                                            <select class="form-control" id="flag_type">
                                                <option value="">Select Type</option>
                                                <option value="Risk">Risk</option>
                                                <option value="Impediment">Impediment</option>
                                                <option value="Blocker">Blocker</option>
                                                <option value="Action">Action</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <label for="lead-manager">Assignee <small
                                                    class="text-danger">*</small></label>
                                            <select class="form-control" id="flag_assign">
                                                <option value="">Select Assignee </option>
                                                @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                                    <option value="{{ $r->id }}">{{ $r->name }}
                                                        {{ $r->last_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Title <small
                                                    class="text-danger">*</small></label>
                                            <input required type="text" class="form-control" id="flag_title">

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Description</label>
                                            <textarea id="flag_description" class="form-control"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button id="updateflagmodalbuton"
                                            class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3"
                                            onclick="updateepicflag();" type="button">Add Flag</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="epic_id mr-3 ml-3 mt-1">
                Target Value:
                {{ $data->symbol }} {{ Quarters::abbreviate($data->target_value) }}

            </div>
            <div class="epic_id mr-3 ml-3 mt-1">
                Target Date:
                {{ \Carbon\Carbon::parse($data->target_date)->format('M d Y') }}

            </div>
        </div>

    </div>
</div>
<div class="rightside">
    <span onclick="maximizemodal()" id="open_in_full">
        <span class="material-symbols-outlined">open_in_full</span>
    </span>
    <span onclick="maximizemodal()" class="d-none" id="close_fullscreen">
        <span class="material-symbols-outlined">close_fullscreen</span>
    </span>
    <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{ url('public/assets/svg/cross.svg') }}">
</div>
<script type="text/javascript">
    function showmemberbox() {
        $('.memberadd-box').slideToggle();
    }

    function rasiseflag() {
        $('.raiseflag-box').slideToggle();
    }

    function selectteamforepic(id, epic_id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epics/selectteamforepic') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                epic_id: epic_id,
            },
            success: function(res) {
                $('#memberstoshow').html(res);
                if ($('#modaltab').val() == 'teams') {
                    showtabwithoutloader(epic_id, 'teams');
                }
                showepicincard();
            },
            error: function(error) {

            }
        });
    }
</script>
<script type="text/javascript">
    var elements = document.querySelectorAll('.gixie');
    elements.forEach(function(element) {
        var itemId = element.getAttribute('data-item-id');
        var imageData = new GIXI(300).getImage();
        element.setAttribute('src', imageData);
    });
</script>
