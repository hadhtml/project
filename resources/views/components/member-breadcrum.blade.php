<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <div class="d-flex flex-row align-items-center">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">group_add</span>                  
                </div>
                <div class="ml-3">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                      All Users
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <a href="{{url('organization/dashboard')}}">Dashboard</a>
                </div>
                <div class="mr-2">
                    <p>All Users</p>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center toolbar">
            <div>
                <button class="btn btn-sm btn-dark" style="display:none;" id="delete-button-user" onclick="delete_record_user();" type="button">Delete All</button>
                <button class="button" data-toggle="modal" data-target="#create-member">Add User</button>
            </div>
        </div>
    </div>
</div>
