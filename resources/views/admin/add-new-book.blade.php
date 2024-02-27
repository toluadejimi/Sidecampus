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
                            <h4 class="card-title">Add New Book</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="add-new-book" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group">
                                        <label>Book Name:</label>
                                        <input type="text" name="title" required class="form-control">
                                    </div>

                                </div>



                                <div class="col-3">

                                    <div class="form-group">
                                        <label>Book Category:</label>
                                        <select class="form-control" required id="exampleFormControlSelect1"
                                            name="category">
                                            <option selected="" disabled="">Book Category</option>
                                            @foreach($category as $data)
                                            <option value="{{ $data->title }}">{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-3">


                                    <div class="form-group">
                                        <label>Book Author:</label>
                                        <select class="form-control" required id="exampleFormControlSelect2"
                                            name="author">
                                            <option selected="" disabled="">Book Author</option>
                                            @foreach($author as $data)
                                            <option value="{{ $data->title }}">{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                            </div>


                            <div class="row">


                                <div class="col-4">

                                    <div class="form-group">
                                        <label>Book Image:</label>
                                        <div class="custom-file">
                                            <input type="file" required class="custom-file-input" name="images"
                                                accept="image/png, image/jpeg, image/webp">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-4">

                                    <div class="form-group">
                                        <label>Book Audio:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="audio"
                                                accept="audio/mp3, audio/wav">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-4">

                                    <div class="form-group">
                                        <label>Book pdf:</label>
                                        <div class="custom-file">
                                            <input type="file" required class="custom-file-input" name="pdf"
                                                accept="application/pdf, application/vnd.ms-excel">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                            </div>



                            <div class="form-group">
                                <label>Book Description:</label>
                                <textarea class="form-control" name="description" rows="4"></textarea>
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
