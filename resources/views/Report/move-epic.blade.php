@if(count($nextQuarter) > 0 )
@foreach($nextQuarter as $Q)
<input type="hidden" class="month" value="{{$Q->month}}">
<input type="hidden" class="quarter" value="{{$Q->quarter_id}}">
<input type="hidden" class="init_id" value="{{$Q->initiative_id}}">
<input type="hidden" class="month_id" value="{{$Q->id}}">
@endforeach
<div class="d-flex flex-column mb-7 fv-row">
  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
      <span class="required">Move incomplete epic to next quarter?</span>
  </label>
  <select class="form-control form-control-solid" id="move_epic" >
    <option value="">Select</option>
    <option value="yes">yes</option>
  </select>
</div>
@endif