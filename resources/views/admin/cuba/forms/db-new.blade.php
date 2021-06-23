@extends('layouts.admin.db-forms')

@section('title', 'Form Wizard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: auto">
                    <div class="card-header">
                        <h5>Two Simple Steps to Start your E-Commerce</h5>
                        <span>Please Make sure fill all the filed before click on next button</span>
                    </div>
                    <div class="card-body">
                        <form class="form-wizard" id="regForm" action="#" method="POST">
                            <div class="tab">
                                <div class="mb-3">
                                    <label for="name">First Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Johan" required="required">
                                </div>
                                <div class="mb-3">
                                    <label for="lname">Last Name</label>
                                    <input class="form-control" id="lname" type="text" placeholder="Deo">
                                </div>
                                <div class="mb-3">
                                    <label for="contact">Contact No.</label>
                                    <input class="form-control digits" id="contact" type="number" placeholder="123456789">
                                </div>
                            </div>
                            <div class="tab">
                                <div class="mb-3">
                                    <label class="control-label">Country</label>
                                    <input class="form-control mt-1" type="text" placeholder="Country" required="required">
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">State</label>
                                    <input class="form-control mt-1" type="text" placeholder="State" required="required">
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">City</label>
                                    <input class="form-control mt-1" type="text" placeholder="City" required="required">
                                </div>
                            </div>
                            <div>
                                <div class="text-end btn-mb">
                                    <button class="btn btn-secondary" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)">Next</button>
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
