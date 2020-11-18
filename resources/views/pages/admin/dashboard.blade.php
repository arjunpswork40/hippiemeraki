@extends('layouts.adminDashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        {{-- <h3>{{ $totalPages }}</h3> --}}
                        <p>Total Pages</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-copy"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- <h3>{{ $totalContactUsRequests }}</h3> --}}
                        <p>Contact Us Requests</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-mail-bulk"></i>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Recent Logins</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>Logged Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($adminLoginLogs as $item)
                                    <tr>
                                        <td>{{ $item->remote_address }}</td>
                                        <td>{{ DateHelper::getCurrentHumanReadableTimeFromDate($item->logged_at) }}</td>
                                        <td>{!! AuthMessages::getLoginStatus($item->status) !!}</td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
{{--                    <div class="card-footer clearfix">--}}
{{--                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Login Attempts</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Recent Contact Us Requests</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Country</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($contactUsRequests as $contactUsRequest)
                                    <tr>
                                        <td class="text-center">{{ $contactUsRequest->first_name.' '.$contactUsRequest->last_name }}</td>
                                        <td class="text-center">{{ $contactUsRequest->company_name }}</td>
                                        <td class="text-center">{{ $contactUsRequest->email }}</td>
                                        <td class="text-center">{{ $contactUsRequest->country }}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                &nbsp;<a href="javascript:;" data-msg="{{ $contactUsRequest->messages }}" class="btn btn-warning view" title="View Message"><i class="fas fa-eye"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <a href="#" class="btn btn-sm btn-secondary float-right">View All Requests</a>
                    </div>
                </div>
            </div>
        </div>


        </div>
@endsection
{{-- @include('pages.admin.contact-us.modal.message-modal') --}}

@push('scripts')

    {{-- <script src="{{ asset('/ad-lte/plugins/chart.js/Chart.min.js') }}"></script> --}}
    <script>
        $(document).ready(function () {
            var App = {
                initialize: function () {
                    $('.view').on('click', function(e) {
                        e.preventDefault();
                        var msg = $(this).data('msg');
                        App.showMessage(msg);
                    })
                },
                showMessage: function(message) {
                    $('#message-text').text(message);
                    $('#message-modal').modal('show');
                }
            };
            App.initialize();
        })
    </script>

@endpush
