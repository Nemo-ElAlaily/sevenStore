@extends('admin.cuba.layouts.cuba')

@section('title', 'Site Settings')

@section('breadcrumb-title')
    <h5>General Settings</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item">General</li>
@stop

@section('content')

    @include('admin.cuba.partials._session')
    @include('admin.cuba.partials._errors')
    <!-- Default box -->
    <div class="mb-4 w-80 bg-white box-shadow border-radius card-solid">
        <div class="card-body">
            <div class="row">
                <form class="col-12" action="{{ route('admin.settings.site.show', $site_settings->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <ul class="nav nav-pills mb-3" id="lang-tab" role="tablist">
                        @foreach (config('translatable.locales') as $index => $locale)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="'pills-{{ $locale }}-tab'"
                                    data-toggle="pill" href="#{{ $locale }}" role="tab"
                                    aria-controls="{{ $locale }}" aria-selected="true">@lang('site.' . $locale .
                                    '.name')</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="lang-tabContent">
                        @foreach (config('translatable.locales') as $index => $locale)
                            <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}"
                                role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">

                                <div class="d-flex justify-content-between">

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}">Title in @lang('site.' .
                                                $locale .
                                                '.name')</label>
                                            @error($locale . '.title')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[title]"
                                                value="{{ $site_settings->translate($locale)->title }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}">Welcome Phrase in
                                                @lang('site.' . $locale .
                                                '.name')</label>
                                            @error($locale . '.welcome_phrase')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[welcome_phrase]"
                                                value="{{ $site_settings->translate($locale)->welcome_phrase }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}">Title in @lang('site.' .
                                                $locale .
                                                '.name')</label>
                                            @error($locale . '.address')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[address]"
                                                value="{{ $site_settings->translate($locale)->address }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}">Title in @lang('site.' .
                                                $locale .
                                                '.name')</label>
                                            @error($locale . '.city')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[city]"
                                                value="{{ $site_settings->translate($locale)->city }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}">Title in @lang('site.' .
                                                $locale .
                                                '.name')</label>
                                            @error($locale . '.country')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[country]"
                                                value="{{ $site_settings->translate($locale)->country }}">
                                        </div>
    
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}[meta_title]">Meta Title in
                                                @lang('site.' .
                                                $locale . '.meta_title')</label>
                                            @error($locale . '.meta_title')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[meta_title]"
                                                value="{{ $site_settings->translate($locale)->meta_title }}">
                                        </div>
    
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}[meta_description]">Meta
                                                Description in @lang('site.' .
                                                $locale .
                                                '.meta_description')</label>
                                            @error($locale . '.meta_description')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[meta_description]"
                                                value="{{ $site_settings->translate($locale)->meta_description }}">
                                        </div>
    
                                        <div class="form-group col-md-6">
                                            <label class="label-page" for="{{ $locale }}[meta_keyword]">Meta Keyword in
                                                @lang('site.' .
                                                $locale . '.meta_keyword')</label>
                                            @error($locale . '.meta_keyword')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control     text-center" type="text"
                                                name="{{ $locale }}[meta_keyword]"
                                                value="{{ $site_settings->translate($locale)->meta_keyword }}">
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class='row'>
                        <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Google Client ID</label>
                                            <br />
                                            <input class="form-control "
                                                name="google_client_id">
                                     </div>
                                </div>

                                <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Google Secret Key</label>
                                            <br />
                                            <input class="form-control "
                                                name="google_secret_key">
                                     </div>
                                </div>

                                <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Google Redirect Link</label>
                                            <br />
                                            <input class="form-control "
                                                name="google_redirect">
                                     </div>
                                </div>
                                <!-- facebook data -->

                                <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Facebook Client ID</label>
                                            <br />
                                            <input class="form-control "
                                                name="facebook_client_id">
                                     </div>
                                </div>

                                <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Facebook Secret Key</label>
                                            <br />
                                            <input class="form-control "
                                                name="facebook_secret_key">
                                     </div>
                                </div>

                                     <div class='col-md-6'>
                                      <div class="form-group">
                                            <label class="label-page">Facebook Redirect Link</label>
                                            <br />
                                            <input class="form-control "
                                                name="facebook_redirect">
                                     </div>

                                </div>
                    </div>

                  <div class="form-group">
                    <label class="label-page">Google Analytics</label>
                    @error($locale . '.meta_description')
                    <br />
                    {{-- <span class="text-danger mx-5">{{ $message }}</span> --}}
                    @enderror
                    <textarea class="form-control     text-center"
                           name="google_analytics"></textarea>
                </div>


                    <div class="row">

                        <div class="form-group col-sm-12 col-lg-6">
                            <label class="label-page">Logo</label>
                            @error('logo')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="logo" class="form-control input-sm image" accept="jpg, png, jpeg, svg">

                            <img src="{{ $site_settings->logo_path }}" width="100px"
                                class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                        <div class="form-group col-sm-6 col-lg-6">
                            <label class="label-page">Favicon</label>
                            @error('favicon')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="favicon" class="form-control input-sm favicon"
                                accept="jpg, png, jpeg, svg">

                            <img src="{{ $site_settings->favicon_path }}" width="100px"
                                class="img-thumbnail favicon-preview mt-1" alt="">
                        </div> {{-- end of form group favicon --}}

                    </div> {{-- end of translatable data --}}
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            Update Site Settings</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
