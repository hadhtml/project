@php
   $leaderline = DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->orwhere('from' , 'unit')->orwhere('from' , 'stream')->get();
@endphp
@foreach($leaderline as $linekeyforslot=> $r)
line{{$linekeyforslot+1}} = new LeaderLine(connectedobjective{{ $r->linked_objective_id }}, 
   slout_out_buisness_unit_key_result_{{ $r->bussiness_key_id }}, {
   startPlug: "behind",
   endPlug: "behind",
   size: 4,
   startPlugSize: 1,
   endPlugSize: 1,
   startSocket: "left",
   endSocket: "right",
   color: "#fb8c00"
   // path: 'grid',
   // dropShadow: {color: '#111', dx: 0, dy: 2, blur: 0.2}
});
@endforeach