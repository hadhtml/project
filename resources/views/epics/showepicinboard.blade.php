<div onclick="editepic({{$e->id}})" class="card" style="width:102.7%">
       <div class="card card-epic border-radius" style="margin-bottom:0px !important">
            <div class="card-header bg-white border-bottom-radius pt-2 pl-4 pr-4 pb-2">
               <div class="d-flex">
                  <div style="width:35%;">
                     <img src="{{ url('public/assets/svg/objectives/four.svg') }}">
                  </div>
                  <div style="width:65%;">
                     @if($e->epic_status == 'Done')
                     <span class="badge-cs-small success">{{$e->epic_status}}</span>
                     @endif
                     @if($e->epic_status == 'In progress')
                     <span class="badge-cs-small warning w-100">{{$e->epic_status}}</span>
                     @endif 
                     @if($e->epic_status == 'To Do')
                     <span class="badge-cs-small bg-secondary ">{{$e->epic_status}}</span>
                     @endif 
                  </div>
               </div>
            @php
               $flag = DB::table('flags')->where('epic_id' , $e->id)->first();
               $flagscount = DB::table('flags')->where('epic_id' , $e->id)->count();
            @endphp
            @if($flag)
            @if($flag->flag_status != 'doneflag')
            <div>
               @if($flag->flag_type == 'Risk')
               <div class="d-flex flex-row align-items-center">
                  <div class="mr-1">
                     <img src="{{ url('public/assets/svg/svgrisk.svg') }}">
                  </div>
                  <div>
                     <span onclick="editepic({{$e->id}})" style="color:#fa9bcf !important; font-size:12px">{{$flag->flag_type}} @if($flagscount > 1) +{{$flagscount}} @endif</span>
                  </div>
               </div>
               @endif
               @if($flag->flag_type == 'Impediment')
               <div class="d-flex flex-row flex-row align-items-center">
                  <div class="mr-1">
                     <img src="{{ url('public/assets/svg/svgeight.svg') }}">
                  </div>
                  <div>
                     <span onclick="editepic({{$e->id}})" style="color:#fa9bcf !important; font-size:12px">{{$flag->flag_type}} @if($flagscount > 1) +{{$flagscount}} @endif</span>
                  </div>
               </div>
               @endif 
               @if($flag->flag_type == 'Blocker')
               <div class="d-flex flex-row flex-row align-items-center">
                  <div class="mr-1">
                     <img src="{{ url('public/assets/svg/svgnine.svg') }}">
                  </div>
                  <div>
                     <span onclick="editepic({{$e->id}})" style="color:#fa9bcf !important; font-size:12px">{{$flag->flag_type}} @if($flagscount > 1) +{{$flagscount}} @endif</span>
                  </div>
               </div>
               @endif 
               @if($flag->flag_type == 'Action')
               <div class="d-flex flex-row flex-row align-items-center">
                  <div class="mr-1">
                     <img src="{{ url('public/assets/svg/svgten.svg') }}">
                  </div>
                  <div>
                     <span onclick="editepic({{$e->id}})" style="color:#fa9bcf !important; font-size:12px">{{$flag->flag_type}} @if($flagscount > 1) +{{$flagscount}} @endif</span>
                  </div>
               </div>
               @endif 
            </div>
            @endif
            @endif
         </div>
         @php
         $str = strlen($e->epic_name);
         $strl = strlen($e->epic_detail);
         @endphp
         <div
            class="card-body pt-3 pb-3">
            <h6
               class="title load-more" id="load-more{{$e->id}}"  style="line-height:15px">
               {{ \Illuminate\Support\Str::limit($e->epic_name,40, $end='') }}
               @if($str > 40)
               <a onclick="editepic({{$e->id}})" href="javascript:void(0);" onclick="loadmore({{$e->id}});" id="toggle-button{{$e->id}}" class="" style="font-size:10px;">More</a>
               @endif
            </h6>
            <h6
               class="title more-content" id="more-content{{$e->id}}"  style="line-height:15px;display:none">
               {{$e->epic_name}}
               <a href="javascript:void(0);" onclick="seeless({{$e->id}});" id="toggle-button-less{{$e->id}}" class="" style="font-size:10px;">Less</a>
            </h6>
            @php
               $epic_detail  = strip_tags($e->epic_detail);
            @endphp
            <p
               class="content show-read-more" id="show-read{{$e->id}}">
               {!! \Illuminate\Support\Str::limit($epic_detail,122, $end='') !!}
               @if($strl > 122 )
               <a onclick="editepic({{$e->id}})" href="javascript:void(0);" onclick="loadmoretext({{$e->id}});" id="toggle-button-text{{$e->id}}" class="" style="font-size:10px;">More</a>
               @endif
            </p>
            <p
               class="content show-read-more-text" id="show-read-more{{$e->id}}" style="display:none">
               {{$epic_detail}}
               <a href="javascript:void(0);" onclick="seelesstext({{$e->id}});" id="toggle-button-less-text{{$e->id}}" class="" style="font-size:10px">Less</a>
            </p>
            <div
               class="progress">
               <div  @if($e->epic_status == 'Done') class="progress-bar bg-primary" @endif @if($e->epic_status == 'In progress') class="progress-bar bg-warning" @endif @if($e->epic_status == 'To Do') class="progress-bar bg-success" @endif
               role="progressbar"
               style="width: {{$e->epic_progress}}%;"
               aria-valuenow="70"
               aria-valuemin="0"
               aria-valuemax="100" id="progepic{{$e->id}}">
            </div>
         </div>
      </div>
      @if($organization->type == 'org')
      @foreach(DB::table('org_team')->where('org_id',$organization->id)->get() as $r)
      @if($e->team_id == $r->id)
      <div class="ml-5" style="font-size:12px;">
         <b>
         <img src="{{ url('public/assets/svg/objectives/five.svg') }}">
         {{$r->team_title}}
         </b>
      </div>
      @endif
      @endforeach
      @endif
      @if($organization->type == 'stream')
      @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
      @if($e->team_id == $r->id)
      <div class="ml-5" style="font-size:12px;">
         <b>
         <img src="{{ url('public/assets/svg/objectives/five.svg') }}">
         {{$r->team_title}}
         </b>
      </div>
      @endif
      @endforeach
      @endif
      @if($organization->type == 'unit')
      @foreach(DB::table('unit_team')->where('org_id',$organization->id)->get() as $r)
      @if($e->team_id == $r->id)
      <div
         class="ml-5" style="font-size:12.552px;">
         <p>
            <img src="{{ url('public/assets/svg/objectives/six.svg') }}">
            <span class="ml-1">{{$r->team_title}}</span>
         </p>
      </div>
      @endif
      @endforeach
      @endif
      @if($organization->type == 'BU')
      @foreach(DB::table('unit_team')->where('org_id',$organization->org_id)->get() as $r)
      @if($e->team_id == $r->id)
      <div
         class="ml-5" style="font-size:12.552px;">
         <p>
            <img src="{{ url('public/assets/svg/objectives/six.svg') }}">
            <span class="ml-1">{{$r->team_title}}</span>
         </p>
      </div>
      @endif
      @endforeach
      @endif
      @if($organization->type == 'VS')
      @foreach(DB::table('value_team')->where('org_id',$organization->org_id)->get() as $r)
      @if($e->team_id == $r->id)
      <div
         class="ml-5" style="font-size:12.552px;">
         <p>
            <img src="{{ url('public/assets/svg/objectives/seven.svg') }}">
            <span class="ml-1">{{$r->team_title}}</span>
         </p>
      </div>
      @endif
      @endforeach
      @endif
      <div
         class="card-footer bg-white border-none border-top-1px">
         <div
            class="d-flex flex-row justify-content-between">
            <div>
               <span>{{ \Carbon\Carbon::parse($e->epic_start_date)->format('M d')}}</span>
            </div>
            <div>
               <span>{{ \Carbon\Carbon::parse($e->epic_end_date)->format('M d')}}</span>
            </div>
         </div>
      </div>
   </div>
</div>