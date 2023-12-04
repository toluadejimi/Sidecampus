@extends('main.main')
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
            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">My Profile</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="acc-edit">
                            <form action="update-profile" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="uname">First Name:</label>
                                    <input type="text" class="form-control" required id="uname" name="first_name"
                                        value="{{ $user->first_name }}">
                                        <input type="text" hidden class="form-control" id="uname" name="id"
                                        value="{{ $user->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="uname">Last Name:</label>
                                    <input type="text" class="form-control" required id="uname" name="last_name"
                                        value="{{ $user->last_name }}">
                                </div>


                                <div>
                                    <img class="img-fluid rounded" src="{{ $user->image }}" alt="" height="100"
                                        width="100">
                                </div>

                                <div class="form-group my-4 mb-5">

                                    <label>User Image:</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ $user->image }}"
                                            class="custom-file-input" name="images"
                                            accept="image/png, image/jpeg, image/webp">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                             


                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          


        </div>
    </div>
</div>

@endsection