@php
	$alllinked = DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->orwhere('from' , 'unit')->orwhere('from' , 'stream')->get();
@endphp
new PlainDraggable(node_1, {
   onMove: function() {
   @foreach($alllinked as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   onDragEnd: function() {
   		line.dash = false;
   }
});

@foreach(DB::table('org_team')->where('org_id'  , $data->id)->get() as $o_t)
new PlainDraggable(orgteam{{ $o_t->id }}, {
   onMove: function() {
   @foreach($alllinked as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   onDragEnd: function() {
   		line.dash = false;
   }
});
@endforeach