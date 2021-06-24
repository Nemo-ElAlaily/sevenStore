@extends('layouts.admin.db-forms')

@section('title', 'Form Wizard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card cardwizard" style="margin: auto">
                    <div class="card-header">
                        <p class="alert alertTabs text-center">Please Make sure fill all the filed before click on next button</p>
                    </div>
                    <div class="card-body">
                        <form class="form-wizard" id="regForm" action="{{ route('app.start') }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="tab">

                                    <div class="imgTabs">

                                        <img src="{{asset('admins/cuba/assets/images/db.jpg')}}" />
                                            <h5>New Database</h5>
                                    </div>

                                <div class="mb-3">
                                    <label for="DB_DATABASE">New Database Name</label>
                                    <input class="form-control" name="DB_DATABASE" type="text" placeholder="Database Name" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="DB_HOST">New Database Host</label>
                                    <input class="form-control" name="DB_HOST" type="text" placeholder="host">
                                </div>
                                <div class="mb-3">
                                    <label for="DB_USERNAME">New Database Username</label>
                                    <input class="form-control" name="DB_USERNAME" type="url" placeholder="Database Username">
                                </div>
                                <div class="mb-3">
                                    <label for="DB_PASSWORD">New Database Password</label>
                                    <input class="form-control" name="DB_PASSWORD" type="password" placeholder="Database Password">
                                </div>
                            </div>

                             <div class="tab">

                                    <div class="imgTabs">

                                        <img src="{{asset('admins/cuba/assets/images/wordpress.png')}}" />
                                        <h5>Wordpress Database</h5>
                                    </div>

                                <div class="mb-3">
                                    <label for="WP_DB_DATABASE">Wordpress Database Name</label>
                                    <input class="form-control" name="WP_DB_DATABASE" type="text" placeholder="Wordpress Database Name" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="WP_DB_HOST">Wordpress Database Host</label>
                                    <input class="form-control" name="WP_DB_HOST" type="text" placeholder="Wordpress Database Host">
                                </div>
                                <div class="mb-3">
                                    <label for="WP_DB_USERNAME">Wordpress Database Username</label>
                                    <input class="form-control" name="WP_DB_USERNAME" type="url" placeholder="Wordpress Database Username">
                                </div>
                                <div class="mb-3">
                                    <label for="WP_DB_PASSWORD">Wordpress Database Password</label>
                                    <input class="form-control" name="WP_DB_PASSWORD" type="password" placeholder="Wordpress Database Password">
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
@endsection

@section('script')
    <script src="{{asset('admins/cuba/assets/js/form-wizard/form-wizard.js')}}"></script>
@endsection
