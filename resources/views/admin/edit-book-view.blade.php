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
                        <form action="edit-book" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group">
                                        <label>Book Name:</label>
                                        <input type="text" name="title" value="{{ $book->title }}" required class="form-control">

                                        <input type="text" name="id" value="{{ $book->id }}" hidden>
                                    </div>

                                </div>



                                <div class="col-3">

                                    <div class="form-group">
                                        <label>Book Category:</label>
                                        <select class="form-control" required id="exampleFormControlSelect1" name="category">
                                            <option selected="" value="{{ $book->category }}">{{ $book->category }}
                                            </option>
                                            @foreach($category as $data)
                                            <option value="{{ $data->title }}">{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-3">


                                    <div class="form-group">
                                        <label>Book Author:</label>
                                        <select class="form-control" required id="exampleFormControlSelect2" name="author">
                                            <option selected="" value="{{ $book->author }}">{{ $book->author }}</option>
                                            @foreach($author as $data)
                                            <option value="{{ $data->title }}">{{ $data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                            </div>


                            <div class="row">


                                <div class="col-4 my-3">

                                    <div>
                                        <img class="img-fluid rounded" src="{{ $book->images }}" alt="" height="100" width="100">
                                    </div>

                                    <div class="form-group">

                                        <label>Book Image:</label>
                                        <div class="custom-file">
                                            <input type="file" value="{{ $book->images }}" class="custom-file-input" name="images" accept="image/png, image/jpeg, image/webp">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-4 my-3">


                                    <div>
                                        <audio controls style="width: 200px;">
                                            <source src="{{ $book->audio }}">
                                        </audio>
                                    </div>

                                    <div class="form-group">
                                        <label>Book Audio:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" value="{{ $book->audio }}" name="audio" accept="audio/mp3, audio/wav">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-4 my-3">


                                    <div>

                                        <a href="{{ $book->pdf }}"><i class="ri-file-fill text-secondary font-size-18"></i></a>

                                    </div>

                                    <div class="form-group">
                                        <label>Book pdf:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" value="{{ $book->pdf }}" name="pdf" accept="application/pdf, application/vnd.ms-excel">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <div class="row">

                                <div class="col-6 my-3">
                                    <div class="form-group">
                                        <label>Book Description:</label>
                                        <input type="text" class="form-control mb-3" value="{{ $book->description }}" name="description" rows="4">
                                    </div>

                                </div>

                                <div class="col-6 my-3">
                                    <div class="form-group">
                                        <label>Compressed </label>
                                        <select name="compressed" class="form-control" rows="4">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
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
