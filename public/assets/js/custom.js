function main_url() {
    return $('#mainurl').val();
}
$(document).mouseup(function(e) 
{
    var hidepopupall = $(".hidepopupall");
    if (!hidepopupall.is(e.target) && hidepopupall.has(e.target).length === 0) 
    {
        hidepopupall.hide();
    }
});
function selectstorystatus(status , id) {
    $('#storystatus'+id).val(status);
    $('#dropdown'+id).html('Status '+status+' <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none"> <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/> </svg>');
}
function showdetailsofactivity(id){ 
    $('#activitydetalbox'+id).slideToggle();
}
function maximizemodal() {
    $('#modaldialogepic').toggleClass('modalfullscreen');
    $('#edit-epic-modal-new').css('padding-right' , '0px')
    $('#modaldialog').toggleClass('modalfullscreen')
    $('#edit-modal').css('padding-right' , '0px');
    $("#open_in_full").toggleClass("d-none");
    $('#close_fullscreen').toggleClass('d-none');
}
function addnewobjective(event,id , type , slug) {
  $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/addnewobjective",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            unit_id: id,
            type: type,
        },
        success: function(res) {
            editobjective(event , res , slug)
        }
    });
}

function showobjectiveheader(id) {
    $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/showobjectiveheader",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
        },
        success: function(res) {
            $('.modalheaderforapend').html(res);
        },
        error: function(error) {
            
        }
    });
}
function showtabobjective(id , tab) {
    $('#modaltab').val(tab);
    $('.secondportion').addClass('loaderdisplay');
    $('.secondportion').html('<i class="fa fa-spin fa-spinner"></i>');
    $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/showtabobjective",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            tab:tab,
        },
        success: function(res) {
            $('.secondportion').removeClass('loaderdisplay');
            $('.secondportion').html(res);
            $('.tabsclass').removeClass('active');
            $('#'+tab).addClass('active');
        },
        error: function(error) {
            
        }
    });
}

function changeobjectivestatus(status , id) {
    $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/changeobjectivestatus",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            status: status,
        },
        success: function(res) {
            showobjectiveheader(id)
            $('#parentCollapsible').html(res);
        },
        error: function(error) {
            
        }
    });
}
function deleteobjectiveshow(id) {
    $('#deleteobjective'+id).slideToggle();
}
function deleteobjectivemain() {
    var id = $('#obj_delete_id').val();
    deleteobjective(id);
}
function deleteobjective(id) {
    $('#deleteobjectivebutton').html('<i class="fa fa-spin fa-spinner"></i>');
    $("#deleteobjectivebutton" ).prop("disabled", true);
    $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/deleteobjective",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(res) {
            $('#success-obj-delete').html('<div class="alert alert-success" role="alert"> Objective Deleted successfully</div>');
            setTimeout(function() {
                $('#delete-objective').modal('hide');
                $('#success-obj-delete').html('');
            }, 1000);
            $('#deleteobjectivebutton').html('Confirm');
            $("#deleteobjectivebutton" ).prop("disabled", false);
            $('#parentCollapsible').html(res);
            $("#nestedCollapsible" + id).collapse('toggle');
            $('#objectivemodalnew').modal('hide');
        }
    });
}
function getobjkeyweight(id) {

    var type = "{{ $organization->type }}";
    var unit_id = "{{ $organization->id }}";
    $.ajax({
    type: "GET",
    url: "{{ url('get-obj-key-weight') }}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        id:id,
        type:type,
        unit_id:unit_id

    },
    success: function(res) {

    $('#key-weight-data-obj').html(res);


    }
    });

    }


    

    

    function getobjlink(id) {

    var type = "{{ $organization->type }}";
    var unit_id = "{{ $organization->id }}";
    $.ajax({
    type: "GET",
    url: "{{ url('get-obj-link') }}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        id:id,
        type:type,
        unit_id:unit_id

    },
    success: function(res) {

    $('.link-data-obj').html(res);


    }
    });

    }