@if(Session::has('error'))

    <div class="row mt-3">
        <button type="text" class="col-md-6 col-md-offset-3  btn wrongDelivered"
                id="type-error">{{Session::get('error')}}
                <i class="fa fa-exclamation" aria-hidden="true"></i>

        </button>
    </div>

@endif
