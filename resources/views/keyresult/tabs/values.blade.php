<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">database</span>
                </div>
                <div>
                    <h4>Current Value : 54,000 <span>Should Increase to 60,000</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="updatetarget" class="needs-validation" action="{{ url('dashboard/keyresult/updatetarget') }}" method="POST" novalidate>
   @csrf
   <input type="hidden" id="key_result_id" value="{{ $data->id }}" name="id">
   <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12">
         <div class="form-group mb-0">
            <label for="small-description">New Value</label>
            <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="" name="newvalue">   
         </div>
      </div>
   </div>
   <div class="row field_wrapper_key">
      <div class="col-md-12">
          <table class="table value-table">
              <thead>
                  <tr>
                      <th>Updated On</th>
                      <th>Value</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>10 Jan 2023</td>
                      <td>5400</td>
                      <td>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/edit.svg') }}"></a>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/delete.svg') }}"></a>
                      </td>
                  </tr>
                  <tr>
                      <td>10 Jan 2023</td>
                      <td>5400</td>
                      <td>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/edit.svg') }}"></a>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/delete.svg') }}"></a>
                      </td>
                  </tr>
                  <tr>
                      <td>10 Jan 2023</td>
                      <td>5400</td>
                      <td>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/edit.svg') }}"></a>
                          <a class="valueiconeditdelete" href="javascript:void(0)"><img src="{{ url('public/assets/images/icons/delete.svg') }}"></a>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
   </div>
   <div class="row margintopfourtypixel">
      <div class="col-md-12 text-right">
         <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">Save Changes</button>
      </div>
   </div>
</form>