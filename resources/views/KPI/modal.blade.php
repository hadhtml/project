<div class="modal fade" id="create-chart-kpi" tabindex="-1" role="dialog" aria-labelledby="create-chart"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 526px !important;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="success-chart" role="alert"></div>
                            <span id="chart-feild-error" class="ml-3 text-danger"></span>
                            <span id="green-feild-error" class="ml-3 text-danger"></span>
                        </div>
                    </div>
                 
                        <div class="d-flex flex-row">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="modal-title" id="">New KPI</h5>
                                </div>
                                <div class="col-md-12">
                                    <p>Add a Kpi CVC file</p>
                                </div>
                                <div id="success-chart" role="alert"></div>
                                <span id="chart-feild-error" class="ml-3 text-danger"></span>
                            </div>
                            <div class="ml-auto">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <img src="{{ asset('public/assets/images/icons/minus.svg') }}">
                                </button>
                            </div>
                        </div>
                        <form class="needs-validation"  method="POST">
                            @csrf
                    
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 mb-2">
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Title</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="title" required id="title">
                                </div>
                            </div>
                        </div>

                 
                        <div class="row">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                                             name="t_value" id="t_value">

                                        <label for="objective-name">Target Value</label>
                                    </div>
                                </div>
                    
                                
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control"
                                            name="symbol" id="symbol">
                                        <label for="start-date" style="bottom:72px">Symbol</label>
                                    </div>
                                </div>

                                  
                                <div class="col-md-5 col-lg-5 col-xl-5">
                                    <div class="form-group mb-0">
                                        <input type="date" class="form-control"  min="{{ date('Y-m-d') }}"
                                            name="t_date" id="t_date">
                                        <label for="start-date" style="bottom:72px">Target Date</label>
                                    </div>
                                </div>

                            

                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <select class="form-control" name="lead_manager" id="lead_manager">
                                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                              <option  value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                            <?php }  ?>
                                        </select>
                                        <label for="lead-manager">Lead</label>
                                    </div>
                                </div>
                            
    
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <textarea type="text" class="form-control"
                                            value="" cols="5" name="summary" id="summary"></textarea>
                                        <label for="objective-name">Summary</label>
                                    </div>
                                </div>

                          
                           
                         

                            </div>


                </div>

                <div class="modal-footer">
                    <div class="d-flex align-items-end">
                        <button type="button" id="save"  onclick="saveChartKpi();"  class="btn btn-primary  btn-sm ml-4">Submit</button>
                    </div>
                    </form>
                   
                </div>

            </div>
        </div>
    </div>


    <div class="modal" id="edit-kpi-modal-new" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modaldialogepic" role="document">
            <div class="modal-content newmodalcontent" id="kpi-modal-content">
                
            </div>
        </div>
    </div>


