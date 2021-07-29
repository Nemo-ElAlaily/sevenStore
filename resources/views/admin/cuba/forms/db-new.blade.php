@extends('admin.cuba.layouts.db-forms')

@section('title', trans('site.Database Setup'))

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>{{ trans('site.Oops Something went wrong') }}</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="col-md-9 m-auto">
                <div class="card cardwizard" style="margin: auto">
                    <div class="overlay">
                        {{-- <div class="alert alertTabs ">
                        <p class="text-center">Please Make sure fill all the filed before click on next button</p>
                    </div> --}}
                        <div class="linear-database px-5 pt-5 pb-3 border-radius">
                            <div class="imgTabs">
                                <img src="{{ asset('admins/cuba/assets/images/Spcfavicon.png') }}" />
                            </div>
                            <form class="form-wizard" id="regForm" action="{{ route('app.start') }}" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                <div class="linear-database sizeing-database">

                                    <div class="tab">

                                        <div class="mb-3 input-container  ">

                                        {{--<i class="fa fa-user icon"></i>--}}
                                        <input class="form-control" id="cpanel_username" type="text"
                                            name='cpanel_username' placeholder="Cpanel Username" required>
                                    </div>


                                        <div class="mb-3 input-container  ">

                                            {{--<i class="fa fa-key icon"></i>--}}
                                            <input class="form-control" id="cpanel_pass" type="password" name='cpanel_pass'
                                                placeholder="Cpanel Password" required>
                                        </div>


                                        <div class="mb-3 input-container   ">
                                            {{-- <label class="titel-db" for="DB_DATABASE">New Database Name</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="DB_DATABASE" type="text" name='DB_DATABASE'
                                                placeholder="New Database Name" required="required">
                                        </div>
                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="DB_HOST">New Database Host</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="DB_HOST" type="text" name='DB_HOST'
                                                placeholder="New Database Host" required>
                                        </div>
                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="DB_USERNAME">New Database Username</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="DB_USERNAME" type="url" name='DB_USERNAME'
                                                placeholder=" New Database Username" required>
                                        </div>

                                    </div>

                                    <div class="tab">

                                        {{-- <div class="imgTabs"> --}}

                                        {{-- <img src="{{asset('admins/cuba/assets/images/wordpress.png')}}" /> --}}
                                        {{-- <h5>Wordpress Database</h5>
                                    </div> --}}

                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="WP_DB_DATABASE">Wordpress Database Name</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="WP_DB_DATABASE" name='WP_DB_DATABASE'
                                                type="text" placeholder="Wordpress Database Name" required="required">
                                        </div>
                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="WP_DB_HOST">Wordpress Database Host</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="WP_DB_HOST" type="text" name='WP_DB_HOST'
                                                placeholder="Wordpress Database Host" required>
                                        </div>
                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="WP_DB_USERNAME">Wordpress Database Username</label> --}}
                                            {{--<i class="fa fa-user icon"></i>--}}
                                            <input class="form-control" id="WP_DB_USERNAME" name='WP_DB_USERNAME' type="url"
                                                placeholder="Wordpress Database Username" required>
                                        </div>
                                        <div class="mb-3 input-container  ">
                                            {{-- <label class="titel-db" for="WP_DB_PASSWORD">Wordpress Database Password</label> --}}
                                            {{--<i class="fa fa-key icon"></i>--}}
                                            <input class="form-control" id="WP_DB_PASSWORD" name='WP_DB_PASSWORD'
                                                type="password" placeholder="Wordpress Database Password" required>
                                        </div>
                                    </div>



                                </div>
                                <div>
                                    <div class="text-end btn-mb">
                                        <button class="btn btnPrev" id="prevBtn" type="button"
                                            onclick="nextPrev(-1)">Previous</button>
                                        <button class="btn btnNext" id="nextBtn" type="button"
                                            onclick="nextPrev(1)">Next</button>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form:-->

                                <div class="text-center">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                <!-- Circles which indicates the steps of the form:-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admins/cuba/assets/js/form-wizard/form-wizard.js') }}"></script>
@endsection
