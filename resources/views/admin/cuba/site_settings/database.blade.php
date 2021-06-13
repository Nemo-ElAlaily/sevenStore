@extends('layouts.admin.cuba')

@section('title', 'Site Settings')

@section('breadcrumb-title')
    <h5>Database Settings</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item">Database</li>
@stop

@section('content')
    <div class="box-body mx-5 mt-3">

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <form class="col-12"  action="{{ route('admin.database.update', 1) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-sm-12 row">
                    <table class="text-center pt-2 bg-white table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Notes</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td class="align-center">WP_DATABASE_URL</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DATABASE_URL"
                                           value="{{ $database_settings -> WP_DATABASE_URL }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_CONNECTION</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DB_CONNECTION"
                                           value="{{ $database_settings -> WP_DB_CONNECTION }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_HOST</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DB_HOST"
                                           value="{{ $database_settings -> WP_DB_HOST }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_PORT</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DB_PORT"
                                           value="{{ $database_settings -> WP_DB_PORT }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_DATABASE</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DB_DATABASE"
                                           value="{{ $database_settings -> WP_DB_DATABASE }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_USERNAME</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control input-thick" type="text" name="WP_DB_USERNAME"
                                           value="{{ $database_settings -> WP_DB_USERNAME }}">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <tr>
                            <td class="align-center">WP_DB_PASSWORD</td>
                            <td>
                                <div class="form-group">
                                    <input type="password" class="form-control input-thick" type="text" name="WP_DB_PASSWORD"
                                           value="" placeholder="Type Your password">
                                </div>
                            </td>

                            <td></td>
                        </tr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                Update Database Credentials</button>
                        </div>



                        </tbody>
                    </table><!-- end of table -->

                </div>
            </div>

        </form>

    </div>
@stop
