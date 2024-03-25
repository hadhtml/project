@extends('admin.layouts.main-layout')
@section('title','All Agents')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center flex-wrap mr-1">
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                            <h5 class="text-dark font-weight-bold my-1 mr-5">All Users</h5>
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript::void(0)" class="text-muted">Users</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/users/allusers') }}" class="text-muted">All Users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Card-->
            @include('admin.alerts.index')
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Users
                            <div class="text-muted pt-2 font-size-sm">Manage All Users</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-head-custom table-checkable" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Plan</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                                <tr>
                                    <td>{{$r->name}} {{$r->last_name}}</td>
                                    <td>{{$r->plan_title}}</td>
                                    <td>$ {{$r->amount}}</td>
                                    <td>{{$r->transaction_id}}</td>
                                    <td>{{ Cmf::date_format($r->created) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top:10px;" class="row">
                       
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection