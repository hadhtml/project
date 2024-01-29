@if(!isset($noreport))
@if($KEYChart)
@php
$keyqvalue = '';
$keyqfirst =  DB::table('key_quarter_value')->where('key_chart_id', $KEYChart->id)->orderby('id','DESC')->first();
if($keyqfirst)
{
$keyqvalue = $keyqfirst->value;
}        
@endphp
@endif
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">database</span>
                </div>
                <div>
                    <h4>Current Value : @if($KEYChart)<span id="q-value{{$KEYChart->id}}">{{$keyqvalue}}</span>@endif   @if($KEYChart)<span class="valueheading">{{$key->key_result_type}} {{$KEYChart->quarter_value}} @endif</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@if($report && $KEYChart)
<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
     <div class="form-group mb-0">
        <label for="small-description">New Value</label>
        <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control"  id="new-chart-value{{$key->id}}" required>
     </div>
  </div>
</div>
@else
<div class="ml-2 text-danger mt-2" role="alert">
    Define Quarterly Target for Current Quarter
    </div>
@endif
<div class="row field_wrapper_key">
  <div class="col-md-12">
    @if($KEYChart)
    @php
     $keyqvalue =  DB::table('key_quarter_value')->where('key_chart_id', $KEYChart->id)->orderby('id','DESC')->get();
    @endphp
    <div @if($keyqvalue->count() > 4) class="activity-feed" @endif>
        <table class="table value-table">
          <thead>
              <tr>
                  <th>Updated On</th>
                  <th class="text-center">Value</th>
                  <th class="text-right">Action</th>
              </tr>
          </thead>
          <tbody>
            
                @foreach($keyqvalue as $val)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d M Y') }}</td>
                    <td class="text-center" id="edit-val{{$val->id}}">{{$val->value}}</td>
                    <td class="text-right" id="edit-button-val{{$val->id}}">
                        <button class="btn-circle btn-tolbar" type="button" onclick="editquartervalue({{$val->id}},'{{$val->value}}')">
                            <img src="{{ url('public/assets/images/icons/edit.svg') }}">
                        </button>
                        <button class="btn-circle btn-tolbar" type="button" onclick="deletequartervalue({{$val->id}})">
                            <img src="{{ url('public/assets/images/icons/delete.svg') }}">
                        </button>
                    </td>
                </tr>
                @endforeach
            
          </tbody>
      </table>
    </div>
      @endif
  </div>
</div>
<div class="row margintopfourtypixel">
  <div class="col-md-12 text-right">
     <button class="btn btn-primary"  @if($KEYChart) onclick="addnewquartervalue({{$key->id}},'{{$KEYChart->id}}','{{$report->id}}')" @else disabled @endif type="button">Add</button>
  </div>
</div>
@else
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">database</span>
                </div>
                <div>
                    <h4>Values</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed">
        <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
            <div class="nodatafound">
                <h4>Please Start Quarter First for Add Values in Key Result</h4>    
            </div>
        </div>
    </div>
</div>
@endif