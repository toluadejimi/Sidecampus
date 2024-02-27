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
                            <h4 class="card-title">Add New Category</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="add-new-category" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group">
                                        <label>Category Name:</label>
                                        <input type="text" name="title" required class="form-control">
                                    </div>

                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
