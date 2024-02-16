<div class="modal fade" id="create-key-result" tabindex="-1" role="dialog" aria-labelledby="create-key-result" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-key-result">Create Key Result</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                    
                    <div id="success-obj-key"  role="alert"></div>
                    <span id="key-feild-error" class="ml-3 text-danger"></span>

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div id="wieght-error"></div>
            <div class="row" id="weight">
              
             </div>
        
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="checkbox checkbox-lg mb-3">
                            <input class="check" type="checkbox" />
                            <span class="mr-3">Add Weight</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="needs-validation" method="POST" action="#" novalidate>
                        @csrf
                        <input type="hidden" id="key_obj_id">
                        <div class="row">
                            <small id="obj-key-name-error" class="mb-5 ml-5"></small>

                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="key_name" required>
                                    <label for="objective-name">Key Result Title</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}"   onchange="get_date(this.value,'key_end_date')" id="key_start_date" >
                                    <label for="start-date">Start Date</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <input type="date" class="form-control"  id="key_end_date" required>
                                    <label for="end-date">End Date</label>
                                </div>
                            </div>
                               <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                   <select class="form-control" id="key_status" >
                                    <option value="To Do">To Do</option>
                                      <option value="In progress">In Progress</option>
                                       <option value="Done">Done</option>

                                   </select>
                                    <label for="small-description">Status</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="key_detail" required>
                                    <label for="small-description">Small Description</label>
                                </div>
                            </div>
                            @if($type == 'unit' || $type == 'stream')
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                                      <div>
                                        Linking
                                      </div>

                               <a href="javascript:void(0);" onclick="appendteam();" class="add_team text-black" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i></a> 

                                    
                                </div>
                                <hr>
                                </div>

                                
                           
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                 <select name="key-team"  id="key-team" onchange="getteamobj(this.value,1)"  class="form-control key-team" value="" required>
                                                        
                                </select>
                                @if($type == 'unit')
                                    <label for="small-description" style="bottom:72px">Choose {{ Cmf::getmodulename("level_two") }}</label>
                                @endif
                                @if($type == 'stream')
                                <label for="small-description" style="bottom:72px">Choose Team</label>
                                @endif    
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                 <select name="obj-team"  id="obj-team1" onchange="getteamobjstore(this.value,1)"  class="form-control obj-team"  required>
                                                        
                                </select>
                                    <label for="small-description" style="bottom:72px">Choose Objective</label>
                                </div>
                            </div>

                            <div class="col-md-12 field_wrapper_bu_team"></div>
                            @endif

                        <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                              <div>
                                Target Values
                              </div>
                            
                        </div>
                        <hr>
                        </div>

                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group mb-0">
                                   <select class="form-control" id="key_result_type">
                                    <option value="">Select Key Result type</option>
                                    <option  value="Should Increase to">Should Increase To</option>
                                      <option value="Should decrease to">Should decrease To</option>
                                       <option value="Should stay above">Should stay above</option>
                                       <option value="Should stay below">Should stay below</option>
                                       <option value="Achieved">Achieved or not(100% / 0%)</option>

                                   </select>
                                    <label for="small-description">Key Result Type</label>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group mb-0">
                                   <select class="form-control" id="key_result_unit" >
                                    <option value="">Select Key Result Unit</option>
                                    <option  value="number">Number</option>
                                      <option value="pound £">pound £</option>
                                       <option value="Euro €">Euro €</option>
                                       <option value="Dollar $">Dollar $</option>

                                   </select>
                                    <label for="small-description">Unit</label>
                                </div>
                            </div>
                            
                            <div id="target-error" class="w-100 mb-3 ml-2 text-danger"></div>
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group mb-0">
                                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" id="init_value" required>
                                    <label for="objective-name">Initial Number</label>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group mb-0">
                                    <input type="text"  onkeypress="return onlyNumberKey(event)"  class="form-control" id="target_number" required>
                                    <label for="objective-name">Target Number</label>
                                </div>
                            </div>
                            
                                        <div class="col-md-8 mt-1 mb-4">
                                        <div class="form-group mb-0">
                                         <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control target_value" placeholder="" id=""  onkeypress="return onlyNumberKey(event)">
                                         <label for="small-description">Quarter 1 Target Value</label>
                                        </div> 
                                        </div>
                                            <div class="col-md-4 mt-5">
                                            <a href="javascript:void(0);" class="add_value text-black" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i></a>

                                    </div>
                                    <div class="col-md-12 field_wrapper_key"></div>
                                    
                            <div class="col-md-12">
                                <button type="button" onclick="saveKeyObjective();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>