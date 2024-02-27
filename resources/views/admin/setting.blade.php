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
                            <h4 class="card-title">Plan Setting</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="acc-edit">
                            <form action="update-plan" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="uname">Plan Title:</label>
                                    <input type="text" class="form-control" id="uname" name="title"
                                        value="{{ $plan->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Plan Amount (USD):</label>
                                    <input type="number" class="form-control" id="email" name="amount"
                                        value="{{ $plan->amount }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Site Setting</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="acc-edit">
                            <form action="update-setting" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="uname">Email:</label>
                                    <input type="email" class="form-control" id="uname" name="email"
                                        value="{{ $setting->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone Number:</label>
                                    <input type="text" class="form-control" id="email" name="phone_no"
                                        value="{{ $setting->phone_no }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Payment Setting</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="acc-edit">
                            <form action="update-payment" method="post">
                                @csrf

                                <h5 class="my-2">Stripe Settings</h5>

                                <div class="form-group">
                                    <label for="uname">Stripe Secret:</label>
                                    <input type="password" class="form-control" id="uname" name="stripe_s"
                                        value="{{ $setting->stripe_s }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Stripe Public:</label>
                                    <input type="text" class="form-control" name="stripe_p"
                                        value="{{ $setting->stripe_p }}">
                                </div>

                                <hr>

                                <h5 class="my-2">PayPal Settings</h5>

                                <div class="form-group">
                                    <label for="uname">PayPal Client ID:</label>
                                    <input type="text" class="form-control" id="uname" name="paypal_clinet"
                                        value="{{ $setting->paypal_clinet }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Paypal Public:</label>
                                    <input type="password" class="form-control" name="paypal_s"
                                        value="{{ $setting->paypal_s }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
