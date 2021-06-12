@if(session() -> has('error'))
    <div class="alert alert-warning" role="alert">
        {{session() -> get('error')}}
    </div>
@endif
