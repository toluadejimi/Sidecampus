@extends('main.admin')
@section('content')


<div id="content-page" class="content-page">

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">All Books</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="new-book" class="btn btn-primary">Add New book</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 12%;">Book Image</th>
                                        <th style="width: 15%;">Book Name</th>
                                        <th style="width: 15%;">Book Catrgory</th>
                                        <th style="width: 15%;">Book Author</th>
                                        <th style="width: 18%;">Book Description</th>
                                        <th style="width: 7%;">Book pdf</th>
                                        <th style="width: 7%;">Book Audio</th>
                                        <th style="width: 7%;">Reads</th>
                                        <th style="width: 7%;">Plays</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $data )

                                    <tr>
                                        <td><img class="img-fluid rounded" src="{{ $data->images }}" alt=""></td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->category }}</td>
                                        <td>{{ $data->author }}</td>
                                        <td>
                                            <p class="mb-0">{{ $data->description }}</p>
                                        </td>
                                        <td><a href="{{ $data->pdf }}"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>
                                        <td><a href="{{ $data->audio }}"><i class="ri-folder-music-line text-secondary font-size-18"></i></a>
                                        </td>
                                        <td>{{ $data->reads }}</td>
                                        <td>{{ $data->plays }}</td>
                                        @if($data->compressed == 1)
                                        <td>
                                            <div class="badge badge-pill badge-success">Compressed</div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="badge badge-pill badge-danger">Uncompressed</div>
                                        </td>
                                        
                                        @endif
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="edit-book-view?id={{ $data->id }}"><i class="ri-pencil-line"></i></a>

                                                <a class="bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compress" href="compress-book?id={{ $data->id }}"><i class="ri-book-line"></i></a>


                                                <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete-book?id={{ $data->id }}"><i class="ri-delete-bin-line"></i></a>
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
