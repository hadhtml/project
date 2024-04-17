@extends('admin.layouts.main-layout')
@section('title', 'All Faq')
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                    <div
                        class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div class="d-flex align-items-center flex-wrap mr-1">
                            <div class="d-flex align-items-baseline flex-wrap mr-5">

                                <ul
                                    class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="javascript::void(0)" class="text-muted">Manage FAQ</a>
                                    </li>
                                    <li class="breadcrumb-item ml-40">
                                        <a href="javascript::void(0)" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Add Faq
                                        </a>
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
                                Faqs
                                <div class="text-muted pt-2 font-size-sm">Manage Faq</div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-custom table-checkable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Faq as $r)
                                    <tr>
                                        <td>{{ $r->question }}</td>
                                        <td>{{ $r->answer }}</td>
                                        <td>
                                            <a href="javascript::void(0)" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $r->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/delete-plan/' . $r->id) }}" class="btn"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal{{$r->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Faqs</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ url('admin/update-faq') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$r->id}}">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label>Question</label>
                                                                <input type="text" name="question" class="form-control" value="{{$r->question}}"
                                                                    required>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Answer</label>
                                                                <textarea type="text" cols="5" rows="5" name="answer" class="form-control" required>{{$r->answer}}</textarea>
                                                            </div>

                                                        </div>




                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!-- The Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Faqs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ url('admin/save-faq') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <label>Question</label>
                                <input type="text" name="question" class="form-control" required>
                            </div>

                            <div class="col-md-12">
                                <label>Answer</label>
                                <textarea type="text" cols="5" name="answer" class="form-control" required></textarea>
                            </div>

                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>

 





    </script>
@endsection
