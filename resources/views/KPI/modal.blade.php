<div class="modal fade" id="create-chart-kpi" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog mw-650px" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
            
                <div class="text-center mb-13">
                  <h1 class="mb-3" id="end-quartr">New KPI</h1>
                  <div class="text-muted fw-semibold fs-5">
                   Add a Kpi CVC file
               </div>
               </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <div id="success-chart" role="alert"></div>
                        <span id="chart-feild-error" class="ml-3 text-danger"></span>
                        <span id="green-feild-error" class="ml-3 text-danger"></span>
                        <div id="success-chart" role="alert"></div>
                        <span id="chart-feild-error" class="ml-3 text-danger"></span>
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
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Target Value</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" onkeypress="return onlyNumberKey(event)"
                                     name="t_value" id="t_value">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Symbol</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="symbol" id="symbol">
                            </div>
                        </div> 
                        <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Target Date</span>
                                </label>
                                <input type="date" class="form-control form-control-solid"  min="{{ date('Y-m-d') }}"
                                    name="t_date" id="t_date">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Lead</span>
                                </label>
                                <select class="form-control form-control-solid" name="lead_manager" id="lead_manager">
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option  value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Summary</span>
                                </label>
                                <textarea type="text" class="form-control form-control-solid" cols="3" name="summary" id="summary"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <button type="button" id="save"  onclick="saveChartKpi();"  class="btn btn-primary">Submit</button>
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