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
    <div class="mb-4 w-80 bg-white  border-radius card-solid">
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

                                        <div class="col-md-6">
                                            <div class="form-group">                                          
                                           <label class="" for="{{ $locale }}> Title in @lang('site.' . $locale .'.site_settings')</label>
                                              
                                                <input class="form-control text-center" placeholder="Title in @lang('site.' .
                                                $locale .
                                                '.name')" type="text"
                                                    name="{{ $locale }}[title]"
                                                    value="{{ $site_settings->translate($locale)->title }}">
                                            </div>
                                        </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label  class="" for="{{ $locale }}>
                                        
                                            Welcome Phrase in
                                                @lang('site.' . $locale .
                                                '.name')
                                                
                                        </label>    
                                        @error($locale . '.welcome_phrase')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            
                                           
                                            <input class="form-control text-center" placeholder="Welcome Phrase in @lang('site.' . $locale .'.name')" type="text"
                                                name="{{ $locale }}[welcome_phrase]"
                                                value="{{ $site_settings->translate($locale)->welcome_phrase }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                           
                                        <div class="form-group">                                             
                                            <label class="label-page" for="{{ $locale }}">Address in @lang('site.' .
                                                $locale .
                                                '.name')</label>
                                                @error($locale . '.address')
                                                    <br />
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                            
                                                <input class="form-control text-center" placeholder="Address in @lang('site.' .
                                                $locale .
                                                '.name')" type="text"
                                                    name="{{ $locale }}[address]"
                                                    value="{{ $site_settings->translate($locale)->address }}">
                                            </div>
                                        </div>


                                         <div class="col-md-6">
                                             <div class="form-group">  
                                               
                                                    <label class="label-page" for="{{ $locale }}">city in @lang('site.' .
                                                        $locale .
                                                        '.name')</label>
                                                    @error($locale . '.city')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                               
                                               
                                                <input class="form-control text-center" placeholder="City in @lang('site.' .$locale .'.name')" type="text"
                                                name="{{ $locale }}[city]"
                                                value="{{ $site_settings->translate($locale)->city }}">
                                            </div>
                                        </div>

                                        <div class=" col-md-6">
                                           
                                            <div class="form-group">  
                                                    <label class="label-page" for="{{ $locale }}">country in @lang('site.' .
                                                        $locale .
                                                        '.name')</label>
                                                    @error($locale . '.country')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                         
                                          
                                                <input class="form-control text-center" placeholder="Country in @lang('site.' .$locale .'.name')" type="text"
                                                    name="{{ $locale }}[country]"
                                                    value="{{ $site_settings->translate($locale)->country }}">
                                            </div>        
                                        </div>
    

                                        <div class="col-md-6">
                                         
                                            <div class="form-group"> 
                                               
                                                   <label class="label-page text-left" for="{{$locale}}">
                                                    Meta in @lang('site.' .$locale .'.name')
                                                   </label>
                                                <input class="form-control text-center" placeholder="Meta Title in @lang('site.' .$locale .'.name')" type="text"
                                                    name="{{ $locale }}[meta_title]"
                                                    value="{{ $site_settings->translate($locale)->meta_title }}">
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                         
                                            <div class="form-group">
                                                <label class="label-page" for="{{ $locale }}[meta_description]">Description in @lang('site.' .$locale .'.name')</label>
                                                @error($locale . '.meta_description')
                                                    <br />
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                            
                                                <input class="form-control text-center" placeholder="Description in @lang('site.' .$locale .'.meta_description')" type="text"
                                                    name="{{ $locale }}[meta_description]"
                                                    value="{{ $site_settings->translate($locale)->meta_description }}">
                                            </div>
                                        </div>
    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group"> 
                                                
                                                <label class="label-page text-left" for="{{$locale}}[meta_keword]">Meta Keyword in @lang('site.' .$locale .'.name')</label>    
                                                <input class="form-control text-center" placeholder="Meta Keyword in @lang('site.' .$locale .'.name')" type="text"
                                                    name="{{ $locale }}[meta_keyword]"
                                                    value="{{ $site_settings->translate($locale)->meta_keyword }}">
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class='row my-4'>
                        <div class="col-md-12">
                            <h2 class="text-left setting-general-title ">Google Setting</h2>
                        </div>
                                <div class='col-md-4'>
                                      <div class="form-group">
                                            <label class="label-page">Google Client ID</label>
                                            <br />
                                            <input class="form-control " placeholder="Google Client ID"
                                                name="google_client_id">
                                     </div>
                                </div>

                                <div class='col-md-4'>
                                      <div class="form-group">
                                            <label class="label-page">Google Secret Key</label>
                                            <br />
                                            <input class="form-control " placeholder="Google Secret Key"
                                                name="google_secret_key">
                                     </div>
                                </div>

                                <div class='col-md-4'>
                                      <div class="form-group">
                                            <label class="label-page">Google Redirect Link</label>
                                            <br />
                                            <input class="form-control " placeholder="Google Redirect Link"
                                                name="google_redirect">
                                     </div>
                                </div>
                                
                                <div class="form-group my-4">
                                    <label class="label-page">Google Analytics</label>
                                    @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control" rows="8" placeholder="Google Analytics"
                                    name="google_analytics"></textarea>
                                </div>

                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <h2 class="text-left setting-general-title my-4">Facebook Setting</h2>
                                    </div>
    
                                    <div class="row">
                                                        <!-- facebook data -->
                                            <div class='col-md-12  mt-2 mb-4'>
                                                <div class="form-group">
                                                    <label class="label-page">Facebook Client ID</label>
                                                    <br />
                                                    <input class="form-control " placeholder="Facebook Client ID"
                                                        name="facebook_client_id">
                                            </div>
                                            </div>

                                            <div class='col-md-12 mb-4'>
                                                    <div class="form-group">
                                                        <label class="label-page">Facebook Secret Key</label>
                                                        <br />
                                                        <input class="form-control " placeholder="Facebook Secret Key"
                                                            name="facebook_secret_key">
                                                </div>
                                            </div>

                                            <div class='col-md-12 mb-4'>
                                                <div class="form-group">
                                                    <label class="label-page">Facebook Redirect Link</label>
                                                    <br />
                                                    <input class="form-control " placeholder="Facebook Redirect Link"
                                                        name="facebook_redirect">
                                                </div>

                                            </div>


                                    </div>
                                </div>
                                <div class="col-md-5 text-center">
                                    <div class="row">
                                        <div class="col-md-12 my-4">
                                            <h2 class="text-center setting-general-title">Image Upload</h2>
                                        </div>
                                        <div class="form-group col-sm-12 col-lg-12">
                                            <label class="label-page">Logo</label>
                                            @error('logo')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                            <input type="file" name="logo" class="form-control input-sm image" accept="jpg, png, jpeg, svg">
                
                                            <img src="{{ $site_settings->logo_path }}" width="100px"
                                                class="img-thumbnail image-preview mt-1" alt="">
                                        </div> {{-- end of form group image --}}
                
                                        <div class="form-group col-sm-6 mt-4 col-lg-12">
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
                                 
                                </div>
                    </div>


                    <div class="col-12 text-center m-auto">                        
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            Update Site Settings</button>
                    </div>
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
