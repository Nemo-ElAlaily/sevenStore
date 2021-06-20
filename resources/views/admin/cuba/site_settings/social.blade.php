@extends('layouts.admin.cuba')

@section('title', 'Site Settings')

@section('breadcrumb-title')
    <h5>Social Settings</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item">Social</li>
@stop

@section('content')
    <div class="box-body mx-5 mt-3">

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <form class="col-12"  action="{{ route('admin.settings.social.update') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="row">
                <div class="col-sm-12 row">
                    <table class="text-center pt-2 table table-hover table-bordered">
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
                            @foreach ($socials as $index=>$social)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucfirst($social -> key) }}</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="{{ $social -> key }}"
                                                       value="{{ $social -> value != null ? $social -> value : old( $social -> key ) }}" placeholder="https://">
                                        </div>
                                    </td>

                                    <td>
                                        @error($social -> key)
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>

                            @endforeach

                            <div class="form-group">
                                <button type="submit" class="btn btnAdd"><i class="fa fa-edit"></i>
                                    Update Social Links</button>
                            </div>

                            </tbody>

                        @else
                            <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                        @endif

                    </table><!-- end of table -->

                </div>
            </div>

        </form>

    </div>
@stop
