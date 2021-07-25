@extends('layouts.admin.cuba')

@section('title', 'Menue'   )

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Pages') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')
<div class='row'>
<!-- main menue -->
                    <div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h5 class="mb-0">
									<button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon1" aria-expanded="true" aria-controls="collapseicon1" data-bs-original-title="" title="">{{trans('site.main_menue')}}</button>
								</h5>
							</div>
                            <form action='{{route("update.main.menue")}}' method='post'>
                                @csrf
                                @method('PUT')
							<div class="collapse show" id="collapseicon1" data-bs-parent="#accordion" aria-labelledby="collapseicon1" style="">
								<div class="card-body animate-chk">
									@foreach($pages as $p)
                                    <label class="d-block" >
									<input   type="checkbox"  name='pages[]' value='{{$p->id}}' @if($p->show_in_navbar == 1) checked @endif > {{$p->title}}
									</label>
									@endforeach
								</div>
								<button class="btn btn-block btn-primary text-center" type="submit" data-bs-original-title="" title="" style='margin: 10px;'>Save</button>
							</div>
                            </form>
						</div>
					</div>

                    <!-- sidebar  menue -->
                    <div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h5 class="mb-0">
									<button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2" data-bs-original-title="" title="">{{trans('site.sidebar')}}</button>
								</h5>
							</div>
                            <form action='{{route("update.side.menue")}}' method='post'>
                            @csrf
                                @method('PUT')
							<div class="collapse show" id="collapseicon2" data-bs-parent="#accordion" aria-labelledby="collapseicon2" style="">
								<div class="card-body animate-chk">
                                    @foreach($pages as $p)
                                    <label class="d-block" >
									<input   type="checkbox"  name='pages[]' value='{{$p->id}}' @if($p->show_in_sidebar == 1) checked @endif > {{$p->title}}
									</label>
									@endforeach
								</div>
								<button class="btn btn-block btn-primary text-center" type="submit" data-bs-original-title="" title="" style='margin: 10px;'>Save</button>
							</div>
                            </form>
						</div>
					</div>


                     <!-- footer link 2 menue -->
                     <div class="col-xl-6">
						<div class="card">
							<div class="card-header">
								<h5 class="mb-0">
									<button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon3" aria-expanded="true" aria-controls="collapseicon3" data-bs-original-title="" title="">{{trans('site.Footer')}}</button>
								</h5>
							</div>
                            <form action='{{route("update.footer.menue")}}' method='post'>
                                @csrf
                                @method('PUT')
							<div class="collapse show" id="collapseicon3" data-bs-parent="#accordion" aria-labelledby="collapseicon3" style="">
								<div class="card-body animate-chk">
									@foreach($pages as $p)
                                    <label class="d-block" >
									<input   type="checkbox"  name='pages[]' value='{{$p->id}}' @if($p->show_in_footer == 1) checked @endif > {{$p->title}}
									</label>
									@endforeach
								</div>
								<button class="btn btn-block btn-primary text-center" type="submit" data-bs-original-title="" title="" style='margin: 10px;'>Save</button>
							</div>
                            </form>
						</div>
					</div>
</div>                  
                @stop