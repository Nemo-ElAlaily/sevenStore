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
                        <form class="form-wizard" id="regForm" action="#" method="POST">
                            
                            <div class="tab">

                                    <div class="imgTabs">
                                        
                                        <img src="{{asset('admins/cuba/assets/images/db.jpg')}}" />
                                            <h5>New Database</h5>
                                    </div>

                                <div class="mb-3">
                                    <label for="name">DB.Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="db.name" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="lname">Host</label>
                                    <input class="form-control" id="lname" type="text" placeholder="host">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">URL</label>
                                    <input class="form-control" id="contact" type="url" placeholder="Url">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">User Name</label>
                                    <input class="form-control" id="contact" type="url" placeholder="User Name">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">Password</label>
                                    <input class="form-control" id="contact" type="password" placeholder="User Name">
                                </div>
                            </div>
                            
                             <div class="tab">

                                    <div class="imgTabs">
                                        
                                        <img src="{{asset('admins/cuba/assets/images/wordpress.png')}}" />
                                        <h5>Wordpress Database</h5>
                                    </div>

                                <div class="mb-3">
                                    <label for="name">DB.Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="db.name" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="lname">Host</label>
                                    <input class="form-control" id="lname" type="text" placeholder="host">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">URL</label>
                                    <input class="form-control" id="contact" type="url" placeholder="Url">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">User Name</label>
                                    <input class="form-control" id="contact" type="url" placeholder="User Name">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">Password</label>
                                    <input class="form-control" id="contact" type="password" placeholder="User Name">
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
