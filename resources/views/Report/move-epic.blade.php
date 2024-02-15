@if(count($nextQuarter) > 0 )
@foreach($nextQuarter as $Q)
<input type="hidden" class="month" value="{{$Q->month}}">
<input type="hidden" class="quarter" value="{{$Q->quarter_id}}">
<input type="hidden" class="init_id" value="{{$Q->initiative_id}}">
<input type="hidden" class="month_id" value="{{$Q->id}}">
@endforeach

<label for="small-description">Move incomplete epic to next quarter?</label>
<div class="form-group mb-0">
    <select class="form-control" id="move_epic" >
    <option value="">Select</option>
    <option value="yes">yes</option>
</select>
</div>
@endif