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
function addnewobjective(id , type , slug) {
  $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/addnewobjective",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            type: type,
        },
        success: function(res) {
            editobjective(id , slug)
        }
    });
}
function editobjective(id , slug) {
    var new_url=""+main_url()+"/dashboard/organization/"+slug+"/portfolio/org?objective="+id;
    window.history.pushState("data","Title",new_url);
    $.ajax({
        type: "POST",
        url: main_url()+"/dashboard/objectives/getobjective",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
        },
        success: function(res) {
            $('#objective-modal-content').html(res);
            $('#objectivemodalnew').modal('show');
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
 function saveObjective() {
        
    var objective_name = $('#objective_name').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var detail = $('#obj_small_description').val();
    var org_id = "{{ $organization->org_id }}";
    var slug = "{{ $organization->slug }}";
    var unit_id = "{{ $organization->id }}";
    var type = "{{ $organization->type }}";
    var objective_status = $('#obj_status').val();


    if ($('#objective_name').val() == '' ||  $('#end_date').val() == '') {
        $('#obj-feild-error').html('Please fill out all required fields.');
        return false;
    }

    var unitid = [];
    $('.unitobj').each(function() {
        unitid.push($(this).val());
    });

    var unitObj = [];
    $('.bu-obj').each(function() {
        unitObj.push($(this).val());
    });

    var unitObjkey = [];
    $('.key-BU').each(function() {
        unitObjkey.push($(this).val());
    });


    $('#saveobjectivebutton').html('<i class="fa fa-spin fa-spinner"></i>');
    $("#saveobjectivebutton" ).prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "{{ url('save-objective') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            objective_name: objective_name,
            start_date: start_date,
            end_date: end_date,
            detail: detail,
            org_id: org_id,
            slug: slug,
            unit_id: unit_id,
            type: type,
            objective_status: objective_status,
            unitid: unitid,
            unitObj: unitObj,
            unitObjkey: unitObjkey,


        },
        success: function(res) {
            // if (res == 1) {

            //     $('#obj-name-error').html(
            //         '<strong class="text-danger">Ojective Name Already Taken</strong>');

            // } else {
            $('#obj-name-error').html('');
            $('#objective_name').val('');
            $('#start_date').val('');
            $('#end_date').val('');
            $('#obj_small_description').val('');
            $('#success-obj').html(
                '<div class="alert alert-success" role="alert"> Objective Created successfully</div>'
            );
            $('#obj-feild-error').html('');
            $('#saveobjectivebutton').html('Save Objective');
            $("#saveobjectivebutton" ).prop("disabled", false);
            setTimeout(function() {
                $('#create-objective').modal('hide');
                $('#success-obj').html('');
            }, 1000);
            $('#parentCollapsible').html(res);

            // }

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
    function UpdateObjective() {

        var edit_obj_id = $('#edit_obj_id').val();
        var edit_objective_name = $('#edit_objective_name').val();
        var edit_start_date = $('#edit_start_date').val();
        var edit_end_date = $('#edit_end_date').val();
        var edit_obj_small_description = $('#edit_obj_small_description').val();
        var org_id = "{{ $organization->org_id }}";
        var slug = "{{ $organization->slug }}";
        var unit_id = "{{ $organization->id }}";
        var status = $('#edit_obj_status').val();
        var type = "{{ $organization->type }}";


        if ($('#edit_objective_name').val() != '' || $('#edit_start_date').val() != '' || $('#edit_end_date').val() !=
            '') {
            $('#updateobjectivebutton').html('<i class="fa fa-spin fa-spinner"></i>');
            $("#updateobjectivebutton" ).prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ url('update-objective') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    edit_objective_name: edit_objective_name,
                    edit_start_date: edit_start_date,
                    edit_end_date: edit_end_date,
                    edit_obj_small_description: edit_obj_small_description,
                    edit_obj_id: edit_obj_id,
                    org_id: org_id,
                    slug: slug,
                    status: status,
                    unit_id: unit_id,
                    type: type
                },
                success: function(res) {
                    $('#success-obj-edit').html('<div class="alert alert-success" role="alert"> Objective Updated successfully</div>');
                    $('#oobj-feild-error-edit').html('');
                    $('#updateobjectivebutton').html('Update Objective');
                    $("#updateobjectivebutton" ).prop("disabled", false);
                    setTimeout(function() {
                        $('#edit-objective').modal('hide');
                        $('#success-obj-edit').html('');
                    }, 1000);
                    $('#parentCollapsible').html(res);
                    $("#nestedCollapsible" + edit_obj_id).collapse('toggle');
                }
            });
        } else {

            $('#obj-feild-error-edit').html('Please fill out all required fields.');

        }
    }


    function deleteobj(obj_id) {
        $('#obj_delete_id').val(obj_id);

    }

    function DeleteObjective() {
        var delete_obj_id = $('#obj_delete_id').val();
        var org_id = "{{ $organization->org_id }}";
        var slug = "{{ $organization->slug }}";
        var unit_id = "{{ $organization->id }}";
        var type = "{{ $organization->type }}";
        $('#deleteobjectivebutton').html('<i class="fa fa-spin fa-spinner"></i>');
        $("#deleteobjectivebutton" ).prop("disabled", true);
        $.ajax({
            type: "POST",
            url: "{{ url('Delete-objective') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                delete_obj_id: delete_obj_id,
                org_id: org_id,
                slug: slug,
                unit_id: unit_id,
                type: type
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
                $("#nestedCollapsible" + delete_obj_id).collapse('toggle');
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