<!-- Updated by Usama Start-->
<div class="modal fade" id="edit-epic-flag" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Flag a Risk</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body flagmodalbody">
                
            </div>
        </div>
    </div>
</div>
<!-- Updated By Usama End -->
<div class="modal" id="edit-key-result-new" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modaldialog" role="document">
        <div class="modal-content newmodalcontent" id="newmodalcontent">
            
        </div>
    </div>
</div>

<div class="modal fade" id="edit-key-result-backup" tabindex="-1" role="dialog" aria-labelledby="edit-key-result" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 550px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-key-result">Update Key Result</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                    <div id="success-obj-key-edit"  role="alert"></div>
                    <span id="key-feild-error-edit" class="ml-3 text-danger"></span>

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            
                 <div id="wieght-error-edit"></div>
                 <div class="row mt-3 mb-2" id="weight-edit">
    

                 </div>
                 
              
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="#" novalidate>
                    @csrf
                    <input type="hidden" id="edit_key_obj_id">
                    <input type="hidden" id="edit_key_obj">

                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="edit_key_name" required>
                                <label for="objective-name">Key Result Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" id="edit_key_start_date"  required>
                                <label for="start-date">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" id="edit_key_end_date"  required>
                                <label for="end-date">End Date</label>
                            </div>
                        </div>
                        
                              <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                               <select class="form-control" id="edit_key_status" >
                                <option value="To Do">To Do</option>
                                  <option value="In progress">In Progress</option>
                                   <option value="Done">Done</option>

                               </select>
                                <label for="small-description">Status</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="edit_key_detail" required>
                                <label for="small-description">Small Description</label>
                            </div>
                        </div>

                        <div class="row ml-1">
                            <div class="col-md-12 link-data">
                         
                                       
                                  
                            </div>
                        </div>

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
                                       <select class="form-control" id="edit_key_result_type">
                                        <option value="Should Increase to">Should Increase To</option>
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
                                       <select class="form-control" id="edit_key_result_unit" >
                                        <option value="number">Number</option>
                                          <option value="pound £">pound £</option>
                                           <option value="Euro €">Euro €</option>
                                           <option value="Dollar $">Dollar $</option>
    
                                       </select>
                                        <label for="small-description">Unit</label>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" id="edit_init_value" required>
                                        <label for="objective-name">Initial Number</label>
                                    </div>
                                </div>
    
                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control" id="edit_target_number" required>
                                        <label for="objective-name">Target Number</label>
                                    </div>
                                </div>

                        <div class="row ml-1">
                            <div class="col-md-12 key-chart-data">
                         
                                       
                                  
                            </div>
                        </div>


                        <div class="col-md-12">
                            <button type="button" onclick="updateKeyObjective();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-objective-key" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Objective Key Result</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="success-key-delete"  role="alert"></div>

        <form method="POST" action="">
         @csrf   
         <input type="hidden" name="" id="key_delete_id">
         <input type="hidden" name="" id="key_delete_obj_id">

        <div class="modal-body">
          
        Are you sure you want to delete this Key Result?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="deletekeyresultbutton" onclick="DeleteObjectivekey();" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- Create Epic -->
<div class="modal" id="objectivemodalnew" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modaldialogepic" role="document">
        <div class="modal-content newmodalcontent" id="objective-modal-content">
            
        </div>
    </div>
</div>

<div class="modal fade" id="delete-objective" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Objective</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="success-obj-delete"  role="alert"></div>

        <form method="POST" action="">
         @csrf   
         <input type="hidden" name="obj_delete_id" id="obj_delete_id">
        <div class="modal-body">
          
        Are you sure you want to delete this Objective?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="deleteobjectivebutton" onclick="deleteobjectivemain();" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- Create Initiative -->
<div class="modal fade" id="create-initiative" tabindex="-1" role="dialog" aria-labelledby="create-initiative" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-initiative">Create Initiative</h5>
                    </div>
                    <div class="col-md-12">
                        <p class="mb-0">Fill out the form, submit and hit the save button.</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            
              <div id="wieght-error-initiative"></div>
            <div class="row" id="weight-initiative">
              
             </div>
                
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <div id="success-initiative"  role="alert"></div>
                        <span id="initiative-feild-error" class="text-danger"></span>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <label class="checkbox checkbox-lg mb-3 ml-4">

                        <input class="checkweight" type="checkbox" />

                        <span class="mr-3"></span>

                        Add Weight

                        </label>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <form class="needs-validation" method="POST" action="#" novalidate>
                    @csrf
                    <input type="hidden" id="key_id_initiative">
                    <input type="hidden" id="obj_id_initiative">

                    <div class="row">
                        <small id="initiative-name-error" class="mb-5 ml-5"></small>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="initiative_name" required>
                                <label for="objective-name">Initiative Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" value="{{date('Y-m-d')}}"  id="initiative_start_date" onchange="get_date(this.value,'initiative_end_date')"  >
                                <label for="start-date">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control"  id="initiative_end_date" >
                                <label for="end-date">End Date</label>
                            </div>
                        </div>
                         <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                               <select class="form-control" id="init_status" >
                                <option value="To Do">To Do</option>
                                  <option value="In progress">In Progress</option>
                                   <option value="Done">Done</option>

                               </select>
                                <label for="small-description">Status</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="initiative_detail" required>
                                <label for="small-description">Small Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="saveinitiativebutton" onclick="saveKeyinitiative();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Save Initiative</button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-initiative" tabindex="-1" role="dialog" aria-labelledby="edit-initiative" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-initiative">Update Initiative</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                    
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            
            {{-- <div id="wieght-error-edit-init"></div>
            <div class="row mt-3 mb-2" id="initiative-edit-weight"></div> --}}
                 
            <div class="modal-body">
               <div class="row">
                    <div class="col-md-12">
                        <div id="success-initiative-edit"  role="alert"></div>
                        <span id="initiative-feild-error-edit" class="ml-3 text-danger"></span>
                        <span  id="initiative-date-error" class="ml-3 text-danger"></span>
                    </div>
                </div>
                <form class="needs-validation" method="POST" action="#" novalidate>
                    @csrf
                    <input type="hidden" id="edit_id_initiative">
                    <input type="hidden" id="edit_id_initiative_key">
                    <input type="hidden" id="edit_id_initiative_obj">
                    <div class="row">
                        <small id="initiative-name-error-edit" class="mb-5 ml-5"></small>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="edit_initiative_name" required>
                                <label for="objective-name">Initiative Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control edit_initiative_start_date" id="edit_initiative_start_date" required>
                                <label for="start-date">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" id="edit_initiative_end_date"  required>
                                <label for="end-date">End Date</label>
                            </div>
                        </div>
                        
                           <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                               <select class="form-control" id="edit_initiative_status" >
                                <option value="To Do">To Do</option>
                                  <option value="In progress">In Progress</option>
                                   <option value="Done">Done</option>

                               </select>
                                <label for="small-description">Status</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="edit_initiative_detail" required>
                                <label for="small-description">Small Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="updateinitiativebutton" onclick="UpdateKeyinitiative();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Update Initiative</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="delete-initiative-key" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Initiative</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="success-initiative-delete"  role="alert"></div>

        <form method="POST" action="">
         @csrf   
         <input type="hidden" name="" id="initiative_delete_id">
         <input type="hidden" name="" id="initiative_delete_obj_id">
         <input type="hidden" name="" id="initiative_delete_key_id">

        <div class="modal-body">
          
        Are you sure you want to delete this Initiative?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="Deletekeyinitiative();" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>




<div class="modal" id="edit-epic-modal-new" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modaldialogepic" role="document">
        <div class="modal-content newmodalcontent" id="epic-modal-content">
            
        </div>
    </div>
</div>

<!--Create Chart-->

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create-chart" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="">New KPI</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Add a Kpi CVC file</p>
                    </div>
                    <div id="success-chart"  role="alert"></div>
                    <span id="chart-feild-error" class="ml-3 text-danger"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="#"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="title" required id="title">
                                <label for="objective-name">Chart Title</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" required name="subtitle" id="subtitle" >
                                <label for="start-date">SubTitle</label>
                            </div>
                        </div>


                          
                        <div class="col-md-12 col-lg-12 col-xl-12">
                             <div class="form-group mb-0">
                                <input type="file" class="form-control" required name="file" accept=".xlsx,.xls,.csv"  id="addfile" >
                                <label for="logo">Upload CSV file</label>
                            </div>
                        </div>

                      
                        <div class="col-md-12">
                            <button  type="button" onclick="saveChartData();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-chart" tabindex="-1" role="dialog" aria-labelledby="edit-chart" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="">Edit/Update Values</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Add a Performance Statistics</p>
                    </div>
                    <div id="success-chart-edit"  role="alert"></div>
                    <span id="" class="ml-3 text-danger"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="#"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="kpi">
                    <div class="row" id="chart-data">
                       
                    
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="delete-chart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Chart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="success-delete-chart"  role="alert"></div>

        <form method="POST" action="">
         @csrf   
         <input type="hidden" name="" id="chart_id">
       

        <div class="modal-body">
          
        Are you sure you want to delete this Graph?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="DeleteChart();" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>

 <div class="modal fade" id="edit-basic-chart" tabindex="-1" role="dialog" aria-labelledby="edit-chart" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="">Edit Basic Detail</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Edit KPI basic details such as target value, statuses options and more.</p>
                    </div>
                    <div id="success-basic-edit"  role="alert"></div>
                    <span id="chart-feild-error-edit" class="ml-3 text-danger"></span>
                    <span id="green-feild-error-edit" class="ml-3 text-danger"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="#"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="chart_edit_id">
                    <input type="hidden" id="stream_id">
                    <div class="row" id="">


                              <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" 
                                    required name="" id="edit_chart_title">

                                <label for="objective-name">Chart Title</label>
                            </div>
                        </div>
                        
                         <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" 
                                    required name="" id="edit_chart_subtitle">

                                <label for="objective-name">Chart SubTitle</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                                    required name="" id="edit_t_value">

                                <label for="objective-name" style="bottom:72px">Target Value</label>
                            </div>
                        </div>
                        
                           <!--<div class="col-md-6 col-lg-6 col-xl-6">-->
                           <!--     <div class="form-group mb-0">-->
                           <!--         <select class="form-control" id="t_display_edit">-->
                                        
                           <!--             <option value="No">No</option>-->
                           <!--             <option value="Yes">Yes</option>-->
                           <!--         </select>-->
                           <!--         <label for="objective-name">Display Guide Line</label>-->
                           <!--     </div>-->
                           <!-- </div>-->
                            
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" required
                                    name="" id="edit_t_date">
                                <label for="start-date">Target Date</label>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" id="edit_t_line">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>

                                </select>
                                <label for="objective-name">Trend Line</label>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <select class="form-control" id="edit_t_bar">
                                    <option value="Bar">Vertical Bar</option>
                                    <option value="Line">Line</option>

                                </select>
                                <label for="objective-name">Chart Type</label>
                            </div>
                        </div> --}}
                        <div class="col-md-12 mb-5">
                            <span><input name="collapseGroupedit"  id="edit_target_option_1" type="radio" value="yes"
                                    class="yes_edit collapseGroup mr-2 editcollapseGroup"  data-toggle="collapse"
                                    data-target="#collapseOne" />Option 1: Red and Green Statuses</span>
                        </div>

                             <div class="col-md-12 col-lg-12 col-xl-12 edit_option_1">
                            <div class="form-group mb-0">
                                
                                <select class="form-control" id="target_status">
                                <option value="Greater">Greater than</option>
                                <option value="Less">Less than</option>
                                </select>
                                <label for="">Select Value </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 edit_option_1">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" onkeyup="get_val_edit(this.value)"
                                    value="" id="edit_g_value_opt_1">
                                <label for="">Green (Value)</label>
                            </div>
                        </div>
                        
                         <!--<div class="col-md-6 col-lg-6 col-xl-6 edit_option_1" >-->
                         <!--       <div class="form-group mb-0">-->
                         <!--           <select class="form-control" id="g_display_edit">-->
                                        
                         <!--               <option value="No">No</option>-->
                         <!--               <option value="Yes">Yes</option>-->
                         <!--           </select>-->
                         <!--           <label for="objective-name">Display Green Guide Line</label>-->
                         <!--       </div>-->
                         <!--   </div>-->
                        <!--<div class="col-md-6 col-lg-6 col-xl-6 edit_option_1">-->
                        <!--    <div class="form-group mb-0">-->
                        <!--        <input type="text"   class="form-control" id="edit_r_value_opt_1">-->
                        <!--        <label for="objective-name">Red (Value)</label>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="col-md-12 mb-5">
                            <span><input id="edit_target_option" name="collapseGroupedit"  value="no" type="radio"
                                    class="no_edit collapseGroup mr-2 editcollapseGroup" data-toggle="collapse"
                                    data-target="#collapseOne" />Option 2: RAG - Red, Amber and Green Statuses</span>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 edit_option_2">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                                    value="" id="edit_g_value_opt_2">
                                <label for="objective-name">Green (Value)</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6 edit_option_2">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                                    value="" id="edit_r_value_opt_2">
                                <label for="objective-name">Red (Value)</label>
                            </div>
                        </div>
                        
                        <!--<div class="col-md-12 col-lg-12 col-xl-12 edit_option_2" >-->
                        <!--        <div class="form-group mb-0">-->
                        <!--            <select class="form-control" id="g_display_edit_2">-->
                                        
                        <!--                <option value="No">No</option>-->
                        <!--                <option value="Yes">Yes</option>-->
                        <!--            </select>-->
                        <!--            <label for="objective-name">Display Green Guide Line</label>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <div class="col-md-12 col-lg-12 col-xl-12 edit_option_2">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control"  value="" id="edit_a_value_opt_2">
                                <label for="objective-name">Amber (Value)</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-5">
                            <span><input id="edit_target_option_3" name="collapseGroupedit"  value="null" type="radio"
                                    class="collapseGroup mr-2 editcollapseGroup" data-toggle="collapse"
                                    data-target="#collapseOne" />Option 3: No Status</span>
                        </div>

                        <button type="button" id="" onclick="UpdateChartDataBasic();"
                                class="btn btn-primary  btn-lg ">Update</button>
                       
                    
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="end-report" tabindex="-1" role="dialog" aria-labelledby="end-report" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic"></h5>
                    </div>
               
                      
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="success-sprint"  role="alert"></div>
                        <span id="sprint-error" class="text-danger"></span>
                    </div>
                </div>
                <form class="needs-validation" action="#" method="POST" novalidate>
                @csrf
            
                    <div class="row">
                    <input type="hidden" id="month">
                    <input type="hidden" id="quarter">
                    <input type="hidden" id="init_id">
                    <input type="hidden" id="month_id">

 
 
                       <div class="col-md-12 col-lg-12 col-xl-12" id="end-quartr">
                       
                       </div>
                       <div class="col-md-12 col-lg-12 col-xl-12 mt-3" id="move-epic">
                       
                       </div>
 
                    
               
 
                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary " onclick="endquarter();"  type="button">Finish Quarter </button>

                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>





