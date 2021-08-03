@extends('admin.cuba.layouts.cuba')

@section('title', 'Site Settings')

@section('breadcrumb-title')
    <h5>Social Settings</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item">Social</li>
@stop

@section('content')
    <div class="box-body">

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <form class="col-12" action="{{ route('admin.settings.social.update') }}" method="POST"
            enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="row">
                <div class="border-radius box-shadow w-80 box-body p-5 my-5 bg-white">
                    <table class="text-center pt-2 card-body table table-hover table-bordered">
                        @if ($socials->count() > 0)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $color = array(
                                        'facebook' => '#3b5998',
                                        'twitter'=> '#1da1f2',
                                        'linkedin' => '#3b5998',
                                        'pinterest'=> '#bd081c',
                                        'instagram'=> '#0a66c2',
                                        'youtube'=> '#c32aa3',
                                        'whatsapp'=> '#128c7e'
                                         );
                                         ?>
                            
                                
                             
                                @foreach ($socials as $index => $social)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><i class="social-icon-setting fa fa-{{ $social->key == 'whatsApp' ? 'whatsapp' : $social -> key }} fa-lg" style="color: {{ $color[$social->key] }}"> </i> {{ ucfirst($social->key) }}</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control input-thick" type="text"
                                                    name="{{ $social->key }}"
                                                    value="{{ $social->value != null ? $social->value : old($social->key) }}"
                                                    placeholder="https://">
                                            </div>
                                        </td>

                                        <td>
                                            @error($social->key)
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        @else
                            <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                        @endif

                    </table><!-- end of table -->
                    <div class="form-group col-md-12 text-center my-4">
                        <button type="submit" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                            Update Social Links</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
@stop
