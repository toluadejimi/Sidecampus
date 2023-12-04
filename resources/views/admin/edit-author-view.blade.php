@extends('main.admin')
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
                            <h4 class="card-title">Edit Author</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="edit-author" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group">
                                        <label>Author Name:</label>
                                        <input type="text" name="title" value="{{ $author->title }}" required class="form-control">
                                        <input type="text" name="id" hidden value="{{ $author->id }}" class="form-control">

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