@extends('admin.cuba.layouts.app')

@section('title', 'Site Settings')

@section('breadcrumb-title')
    <h5>Database Settings</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item">Database</li>
@stop

@section('content')
    <div class="section">
        <div class="box-body mx-5 mt-3">

            @include('admin.cuba.partials._session')
            @include('admin.cuba.partials._errors')

            <form class="col-12" action="{{ route('admin.settings.database.update', 1) }}" method="POST"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row card">
                    <div class="col-sm-12 row">
                        <table class="text-center pt-2 bg-white table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-dark">Key</th>
                                    <th class="text-dark">New Database</th>
                                    <th class="text-dark">Wordpress Database</th>
                                    <th class="text-dark">Notes</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td class="align-center text-dark">URL</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DATABASE_URL"
                                                value="{{ $database_settings->DATABASE_URL }}">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DATABASE_URL"
                                                value="{{ $database_settings->WP_DATABASE_URL }}">
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">Connection</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DB_CONNECTION"
                                                value="{{ $database_settings->DB_CONNECTION }}">
                                            @error('DB_CONNECTION')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DB_CONNECTION"
                                                value="{{ $database_settings->WP_DB_CONNECTION }}">
                                            @error('WP_DB_CONNECTION')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">Host</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DB_HOST"
                                                value="{{ $database_settings->DB_HOST }}">
                                            @error('DB_HOST')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DB_HOST"
                                                value="{{ $database_settings->WP_DB_HOST }}">
                                            @error('WP_DB_HOST')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">WP_DB_PORT</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DB_PORT"
                                                value="{{ $database_settings->DB_PORT }}">
                                            @error('DB_PORT')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DB_PORT"
                                                value="{{ $database_settings->WP_DB_PORT }}">
                                            @error('WP_DB_PORT')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">Database Name</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DB_DATABASE"
                                                value="{{ $database_settings->DB_DATABASE }}">
                                            @error('DB_DATABASE')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DB_DATABASE"
                                                value="{{ $database_settings->WP_DB_DATABASE }}">
                                            @error('WP_DB_DATABASE')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">Database Username</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="DB_USERNAME"
                                                value="{{ $database_settings->DB_USERNAME }}">

                                            @error('DB_USERNAME')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input class="form-control input-thick" type="text" name="WP_DB_USERNAME"
                                                value="{{ $database_settings->WP_DB_USERNAME }}">
                                            @error('WP_DB_USERNAME')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="align-center text-dark">Password</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-thick" type="text"
                                                name="DB_PASSWORD" value="" placeholder="Type Your password">
                                            @error('DB_PASSWORD')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-thick" type="text"
                                                name="WP_DB_PASSWORD" value="" placeholder="Type Your password">
                                            @error('WP_DB_PASSWORD')
                                                <span class="text-danger mx-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>

                                    <td></td>
                                </tr>

                                <div class="row py-5 m-auto text-center">

                                    <div class="col-md-4">
                                        <div class="form-group m-6">
                                            <button type="submit" class="btn btnEdit "><i class="fa fa-edit"></i>
                                                Update Database Credentials</button>
                                        </div>

                                        <div class="form-group m-5">
                                            <a href="{{ route('admin.settings.database.migration', 1) }}"
                                                class="btn btnImport"><i class="fa fa-check-circle"></i>
                                                Import Data</a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 alert-database">
                                        <h6>Requirements:</h6>
                                        <p class="text-bold">
                                            PHP > 7.3
                                            <br>
                                            Change max_input_time in "php.ini" file to 1200 sec.
                                            <br>
                                            Change memory_limit in "php.ini" file to 250M.
                                            <br>
                                        </p>
                                    </div>
                                </div>

                            </tbody>
                        </table><!-- end of table -->

                    </div>
                </div>

            </form>

        </div>
    </div>
@stop
