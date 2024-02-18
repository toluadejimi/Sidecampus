@extends('main.admin')
@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                            <div class="text-left ml-3">
                                <h2 class="mb-0"><span class="counter">{{number_format($user) }}</span></h2>
                                <h5 class="">Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                            <div class="text-left ml-3">
                                <h2 class="mb-0"><span class="counter">{{number_format($books) }}</h2>
                                <h5 class="">Books</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-shopping-cart-2-line"></i></div>
                            <div class="text-left ml-3">
                                <h2 class="mb-0">$<span class="counter">{{number_format($transaction, 2) }}</h2>
                                <h5 class="">Income</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                            <div class="text-left ml-3">
                                <h2 class="mb-0"><span class="counter">{{number_format($categories) }}</span></h2>
                                <h5 class="">Categories</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Subscription</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Days Remaining</th>
                                        <th scope="col">Subscription Date</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Status</th>


                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        @foreach ($subs as $data)
                                        <td>{{ $data->user->first_name }} {{ $data->user->last_name }}</td>
                                        <td>{{ $data->days_remaining }}</td>
                                        <td>{{ $data->subscribe_at }}</td>
                                        <td>{{ $data->expires_at }}</td>
                                        @if ($data->status == 0)
                                        <td>
                                            <div class="badge badge-pill badge-danger">Inactive</div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="badge badge-pill badge-success">Active</div>
                                        </td>
                                        @endif

                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                </span>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">All Users</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $data)

                                            <tr>
                                                <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->gender }}</td>
                                                @if ($data->status == 0)
                                                <td>
                                                    <div class="badge badge-pill badge-pending">Unverified</div>
                                                </td>
                                                @else
                                                <td>
                                                    <div class="badge badge-pill badge-success">Verfied</div>
                                                </td>
                                                @endif
                                            </tr>

                                            @empty

                                            <tr>
                                                <td> No Record Found</td>
                                            </tr>

                                            @endforelse
                                        </tbody>



                                    </table>

                                    {{ $users->links() }}

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
