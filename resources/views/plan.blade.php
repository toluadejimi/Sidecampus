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


    <style>
        /*style for overall progress bar */
        progress {
            /*reset to default appearance*/
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

            width: 200px;
            height: 20px;
            border-radius: 20px;
            border: 1px solid #434343;
        }

        /*style for background track*/
        progress::-webkit-progress-bar {
            background: rgb(221, 221, 221);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2) inset;
            border-radius: 20px;
        }

        /*style for progress track*/
        progress::-webkit-progress-value {
            background-image: linear-gradient(120deg, #05045d 0, #007acc 55%);
            border-radius: 20px;
        }
    </style>




    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">My Plan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="acc-edit">

                            @if ($ck == null ||$ck == 0 )

                            <div>
                                <p>You dont have any active plan</p>
                            </div>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Subscribe to a monthly plan
                            </button>

                            @else

                            <form>
                                <progress value="59" max="{{$plan->days_remaianing}}"> </progress>
                            </form>

                            @endif






                        </div>



                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="iq-card bg-primary text-white">
                                               <div class="iq-card-body border text-center rounded">
                                                  <span class="font-size-16 text-uppercase">{{ $cost->title }}</span>
                                                  <h2 class="mb-4 display-3 font-weight-bolder text-white">${{ $cost->amount }}<small class="font-size-14">/ Month</small></h2>
                                                  <ul class="list-unstyled mb-0 ">
                                                     <li>Full access to Books</li>
                                                     <li>Full access to Audio Books</li>
                                                     <li>24/7 online support</li>
                                                  </ul>
                                               </div>

                                            </div>

                                         </div>

                                         <div class="text-center rounded">
                                            <h6>Pay with Credit / Debit Card</h6>
                                            <a href="{{ $stripe }}">
                                                <img src="https://cdn.keyhole.co/img/paypal/cc_logos.png" height="50" width="150" class="btn btn-light">
                                            </a>

                                            <hr>

                                            <h6>Pay with Paypal</h6>
                                            <a href="{{ $paypal }}">
                                                <img src="https://www.bbwoodcrafts.com/images/53994%20.png" height="60" width="150" class="btn btn-light">
                                            </a>
                                         </div>




                                    </div>

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
