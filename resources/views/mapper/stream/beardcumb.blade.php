@php
if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
}

if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();
$Unit  = DB::table('business_units')->where('id',$team->unit_id)->first();  

}

if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}


@endphp
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <div class="d-flex flex-row align-items-center">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">link</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold ml-2">
                        OKR Mapper
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">home</span>
                        </div>
                        <div>
                            <a href="{{route('organization.dashboard')}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/dashboard/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">link</span>
                        </div>
                        <div>
                            <p>OKR Mapper</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>