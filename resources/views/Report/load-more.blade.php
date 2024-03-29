@if($more == 'load-more' && $page == 'NC-Epic')
@php
 $last_id = '';

$Sprints = DB::table('sprint')->where('id',$sprint)->first();

@endphp
@foreach($SprintEpic as $epic)


@php
$SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
$diff = Carbon\Carbon::parse($Sprints->start_data)->diffInDays($epic->epic_trash);

@endphp
@if($SprintInit)
    <tr>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <g clip-path="url(#clip0_2251_29600)">
                    <path d="M22 11C22 4.92487 17.0751 0 11 0C4.92487 0 0 4.92487 0 11C0 17.0751 4.92487 22 11 22C17.0751 22 22 17.0751 22 11Z" fill="#EFEFEF" />
                    <path d="M9.7267 17.1115C9.60672 17.1115 9.48675 17.0895 9.37199 17.0456C8.98075 16.8917 8.73036 16.507 8.73036 16.0674V12.523H7.50971C7.11326 12.523 6.76896 12.2868 6.60725 11.9076C6.44554 11.5284 6.50814 11.0998 6.76896 10.7866L10.7178 6.06072C10.9943 5.73101 11.4221 5.61561 11.8133 5.77497C12.2045 5.92884 12.4549 6.3135 12.4549 6.75311V10.2975H13.6756C14.072 10.2975 14.4163 10.5338 14.578 10.913C14.7397 11.2921 14.6771 11.7207 14.4163 12.034L10.4674 16.7598C10.2744 16.9906 10.0032 17.1115 9.7267 17.1115ZM11.4533 6.52781C11.4064 6.52781 11.349 6.5443 11.3021 6.60474L7.3532 11.3361C7.26974 11.435 7.30105 11.5339 7.3167 11.5724C7.33235 11.6108 7.38451 11.7043 7.50971 11.7043H9.12159C9.33547 11.7043 9.51283 11.8911 9.51283 12.1164V16.0729C9.51283 16.2103 9.60673 16.2653 9.64846 16.2817C9.69019 16.2982 9.79451 16.3257 9.87797 16.2213L13.8268 11.49C13.9103 11.391 13.879 11.2921 13.8634 11.2537C13.8477 11.2152 13.7955 11.1218 13.6703 11.1218H12.0585C11.8446 11.1218 11.6672 10.9349 11.6672 10.7096V6.75311C11.6672 6.61573 11.5733 6.56078 11.5316 6.5443C11.5159 6.53331 11.4846 6.52781 11.4533 6.52781Z" fill="#292D32" />
                </g>
                <defs>
                    <clipPath id="clip0_2251_29600">
                        <rect width="22" height="22" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <span class="ml-2">SSP-{{$epic->epic_id}}</span>
        </td>
        <td class="cell-20-percent">{{$epic->epic_name}}</td>
        @if($diff > 0)
        <td>Added</td>
        @else
        <td></td>
        @endif
        <td>{{$epic->epic_date}}</td>

        <td>{{$epic->epic_status}}</td>
        <td>IN{{$epic->epic_init_id}}</td>
        @php
        $SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
        @endphp
        <td class="cell-30-percent"><a href="{{url('dashboard/organization/report-init/'.$epic->epic_init_id.'/'.$sprint.'/'.$type)}}">@if($SprintInit){{$SprintInit->initiative_name}}@endif</a></td>
    </tr>
    @endif
    @php
    $last_id = $epic->epic_id;
    @endphp                
    @endforeach
    @endif

@if($more == 'load-more' && $page == 'All-Epic')
@php
 $last_id = '';

$Sprints = DB::table('sprint')->where('id',$sprint)->first();

@endphp
@foreach($SprintEpic as $epic)


@php
$SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
$diff = Carbon\Carbon::parse($Sprints->start_data)->diffInDays($epic->epic_trash);

@endphp
@if($SprintInit)
    <tr>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <g clip-path="url(#clip0_2251_29600)">
                    <path d="M22 11C22 4.92487 17.0751 0 11 0C4.92487 0 0 4.92487 0 11C0 17.0751 4.92487 22 11 22C17.0751 22 22 17.0751 22 11Z" fill="#EFEFEF" />
                    <path d="M9.7267 17.1115C9.60672 17.1115 9.48675 17.0895 9.37199 17.0456C8.98075 16.8917 8.73036 16.507 8.73036 16.0674V12.523H7.50971C7.11326 12.523 6.76896 12.2868 6.60725 11.9076C6.44554 11.5284 6.50814 11.0998 6.76896 10.7866L10.7178 6.06072C10.9943 5.73101 11.4221 5.61561 11.8133 5.77497C12.2045 5.92884 12.4549 6.3135 12.4549 6.75311V10.2975H13.6756C14.072 10.2975 14.4163 10.5338 14.578 10.913C14.7397 11.2921 14.6771 11.7207 14.4163 12.034L10.4674 16.7598C10.2744 16.9906 10.0032 17.1115 9.7267 17.1115ZM11.4533 6.52781C11.4064 6.52781 11.349 6.5443 11.3021 6.60474L7.3532 11.3361C7.26974 11.435 7.30105 11.5339 7.3167 11.5724C7.33235 11.6108 7.38451 11.7043 7.50971 11.7043H9.12159C9.33547 11.7043 9.51283 11.8911 9.51283 12.1164V16.0729C9.51283 16.2103 9.60673 16.2653 9.64846 16.2817C9.69019 16.2982 9.79451 16.3257 9.87797 16.2213L13.8268 11.49C13.9103 11.391 13.879 11.2921 13.8634 11.2537C13.8477 11.2152 13.7955 11.1218 13.6703 11.1218H12.0585C11.8446 11.1218 11.6672 10.9349 11.6672 10.7096V6.75311C11.6672 6.61573 11.5733 6.56078 11.5316 6.5443C11.5159 6.53331 11.4846 6.52781 11.4533 6.52781Z" fill="#292D32" />
                </g>
                <defs>
                    <clipPath id="clip0_2251_29600">
                        <rect width="22" height="22" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <span class="ml-2">SSP-{{$epic->epic_id}}</span>
        </td>
        <td class="cell-20-percent">{{$epic->epic_name}}</td>
        @if($diff > 0)
        <td>Added</td>
        @else
        <td></td>
        @endif
        <td>{{$epic->epic_date}}</td>

        <td>{{$epic->epic_status}}</td>
        <td>IN{{$epic->epic_init_id}}</td>
        @php
        $SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
        @endphp
        <td class="cell-30-percent"><a href="{{url('dashboard/organization/report-init/'.$epic->epic_init_id.'/'.$sprint.'/'.$type)}}">@if($SprintInit){{$SprintInit->initiative_name}}@endif</a></td>
    </tr>
    @endif
    @php
    $last_id = $epic->epic_id;
    @endphp                
    @endforeach
    @endif

    @if($more == 'load-more' && $page == 'C-Epic')
@php
 $last_id = '';

$Sprints = DB::table('sprint')->where('id',$sprint)->first();

@endphp
@foreach($SprintEpic as $epic)


@php
$SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
$diff = Carbon\Carbon::parse($Sprints->start_data)->diffInDays($epic->epic_trash);

@endphp
@if($SprintInit)
<tr>
    <td>
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
            <g clip-path="url(#clip0_2251_29600)">
                <path d="M22 11C22 4.92487 17.0751 0 11 0C4.92487 0 0 4.92487 0 11C0 17.0751 4.92487 22 11 22C17.0751 22 22 17.0751 22 11Z" fill="#EFEFEF" />
                <path d="M9.7267 17.1115C9.60672 17.1115 9.48675 17.0895 9.37199 17.0456C8.98075 16.8917 8.73036 16.507 8.73036 16.0674V12.523H7.50971C7.11326 12.523 6.76896 12.2868 6.60725 11.9076C6.44554 11.5284 6.50814 11.0998 6.76896 10.7866L10.7178 6.06072C10.9943 5.73101 11.4221 5.61561 11.8133 5.77497C12.2045 5.92884 12.4549 6.3135 12.4549 6.75311V10.2975H13.6756C14.072 10.2975 14.4163 10.5338 14.578 10.913C14.7397 11.2921 14.6771 11.7207 14.4163 12.034L10.4674 16.7598C10.2744 16.9906 10.0032 17.1115 9.7267 17.1115ZM11.4533 6.52781C11.4064 6.52781 11.349 6.5443 11.3021 6.60474L7.3532 11.3361C7.26974 11.435 7.30105 11.5339 7.3167 11.5724C7.33235 11.6108 7.38451 11.7043 7.50971 11.7043H9.12159C9.33547 11.7043 9.51283 11.8911 9.51283 12.1164V16.0729C9.51283 16.2103 9.60673 16.2653 9.64846 16.2817C9.69019 16.2982 9.79451 16.3257 9.87797 16.2213L13.8268 11.49C13.9103 11.391 13.879 11.2921 13.8634 11.2537C13.8477 11.2152 13.7955 11.1218 13.6703 11.1218H12.0585C11.8446 11.1218 11.6672 10.9349 11.6672 10.7096V6.75311C11.6672 6.61573 11.5733 6.56078 11.5316 6.5443C11.5159 6.53331 11.4846 6.52781 11.4533 6.52781Z" fill="#292D32" />
            </g>
            <defs>
                <clipPath id="clip0_2251_29600">
                    <rect width="22" height="22" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <span class="ml-2">SSP-{{$epic->epic_id}}</span>
    </td>
    <td class="cell-20-percent">{{$epic->epic_name}}</td>
    @if($diff > 0)
    <td>Added</td>
    @else
    <td></td>
    @endif
    <td>{{$epic->epic_date}}</td>
    <td>{{\Carbon\Carbon::parse($epic->epic_done)->format('M d,Y')}}</td>
    <td>Done</td>
    <td>IN{{$epic->epic_init_id}}</td>
    @php
    $SprintInit = DB::table('sprint_report')->where('initiative_id',$epic->epic_init_id)->where('q_id',$sprint)->first();
    @endphp
    <td class="cell-30-percent"><a href="{{url('dashboard/organization/report-init/'.$epic->epic_init_id.'/'.$sprint.'/'.$type)}}">@if($SprintInit){{$SprintInit->initiative_name}}@endif</a></td>
</tr>
    @endif
    @php
    $last_id = $epic->epic_id;
    @endphp                
    @endforeach
    @endif