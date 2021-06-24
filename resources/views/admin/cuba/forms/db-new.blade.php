@extends('layouts.admin.db-forms')

@section('title', 'Form Wizard')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card cardwizard" style="margin: auto">
                <div class="overlay">
                    {{-- <div class="alert alertTabs ">
                        <p class="text-center">Please Make sure fill all the filed before click on next button</p>
                    </div> --}}
                    <div class="card-body">
                        <div class="imgTabs"> 
                            <img src="{{asset('admins/cuba/assets/images/favicon.png')}}" />
                        </div>
                        <form class="form-wizard" id="regForm" action="{{ route('admin.settings.database.store') }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="tabsShadow">
                            
                                <div class="tab">

                                <div class="mb-3 input-container   ">
                                    {{-- <label class="titel-db" for="DB_DATABASE">New Database Name</label> --}}
                                        <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="DB_DATABASE" type="text" placeholder="New Database Name" required="required">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="DB_HOST">New Database Host</label> --}}
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="DB_HOST" type="text" placeholder="New Database Host">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="DB_USERNAME">New Database Username</label> --}}
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="DB_USERNAME" type="url" placeholder=" New Database Username">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="DB_PASSWORD">New Database Password</label> --}}
                                    <i class="fa fa-key icon"></i>
                                    <input class="form-control" id="DB_PASSWORD" type="password" placeholder="New Database Password ">
                                </div>
                            </div>

                             <div class="tab">

                                    {{-- <div class="imgTabs"> --}}

                                        {{-- <img src="{{asset('admins/cuba/assets/images/wordpress.png')}}" /> --}}
                                        {{-- <h5>Wordpress Database</h5>
                                    </div> --}}

                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="WP_DB_DATABASE">Wordpress Database Name</label> --}}
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="WP_DB_DATABASE" type="text" placeholder="Wordpress Database Name" required="required">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="WP_DB_HOST">Wordpress Database Host</label> --}}
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="WP_DB_HOST" type="text" placeholder="Wordpress Database Host">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="WP_DB_USERNAME">Wordpress Database Username</label> --}}
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control" id="WP_DB_USERNAME" type="url" placeholder="Wordpress Database Username">
                                </div>
                                <div class="mb-3 input-container  ">
                                    {{-- <label class="titel-db" for="WP_DB_PASSWORD">Wordpress Database Password</label> --}}
                                    <i class="fa fa-key icon"></i>
                                    <input class="form-control" id="WP_DB_PASSWORD" type="password" placeholder="Wordpress Database Password">
                                </div>
                            </div>



                            </div>
                            <div>
                                <div class="text-end btn-mb">
                                    <button class="btn btnPrev" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn btnNext" id="nextBtn" type="button" onclick="nextPrev(1)">Next</button>
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
    <script src="{{asset('admins/cuba/assets/js/form-wizard/form-wizard.js')}}"></script>
@endsection
