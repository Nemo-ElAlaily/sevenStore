@extends('layouts.admin.cuba')

@section('title', 'Create Tag')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Tags</li>
    <li class="breadcrumb-item">Create</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 m-auto text-center m-b-3">
                    <img class="imgsTags animate__pulse animate__animated " src="{{asset('admins/cuba/assets/images/tag.png')}}" alt="">
                </div>
                <form class="col-12" action="{{ route('admin.tags.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Tag Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}" required>
                            </div>
                        @endforeach
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label for="{{ $locale }}[slug]">Slug in @lang('site.' . $locale .
                                    '.slug')</label>
                                @error($locale . '.slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                    value="{{ old($locale . '.slug') }}">
                            </div>

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                <label class="custom-control-label" for="is_active">Is Active</label>
                            </div>
                            @error('is_active')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_popular_tag" name="is_popular_tag" checked >
                                <label class="custom-control-label" for="is_popular_tag">Is Popular</label>
                            </div>
                            @error('is_popular_tag')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                            Add Tag</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
