@extends('main.main')
@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">All Categories</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="new-category" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 12%;">Title</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $data )

                                    <tr>
                                        <td>{{ $data->title }}</td>

                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="bg-primary" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit"
                                                    href="edit-category-view?id={{ $data->id }}"><i
                                                        class="ri-pencil-line"></i></a>
                                                <a class="bg-danger" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete"
                                                    href="delete-category?id={{ $data->id }}"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
