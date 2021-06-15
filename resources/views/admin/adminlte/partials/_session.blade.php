@if(Session::has('success'))

    <div class="row mt-3">
        <button type="text" class="col-md-6 col-md-offset-3 btn successDelivered"
        
                id="type-error">{{Session::get('success')}}
                <i class="fa fa-exchange" aria-hidden="true"></i>

        </button>
    </div>

@endif
