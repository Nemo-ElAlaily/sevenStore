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

        <form class="col-12"  action="{{ route('admin.settings.database.update', 1) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row card">
                <div class="col-sm-12 row">
                    <table class="text-center pt-2 bg-white table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-dark">Key</th>
                                <th class="text-dark">Value</th>
                                <th class="text-dark">Notes</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td class="align-center text-dark">WP_DATABASE_URL</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DATABASE_URL"
                                               value="{{ $database_settings -> WP_DATABASE_URL }}">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_CONNECTION</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DB_CONNECTION"
                                               value="{{ $database_settings -> WP_DB_CONNECTION }}">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_HOST</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DB_HOST"
                                               value="{{ $database_settings -> WP_DB_HOST }}">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_PORT</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DB_PORT"
                                               value="{{ $database_settings -> WP_DB_PORT }}">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_DATABASE</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DB_DATABASE"
                                               value="{{ $database_settings -> WP_DB_DATABASE }}">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_USERNAME</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control input-thick" type="text" name="WP_DB_USERNAME"
                                               value="{{ $database_settings -> WP_DB_USERNAME }}">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-center text-dark">WP_DB_PASSWORD</td>
                                <td>
                                    <div class="form-group">
                                        <input type="password" class="form-control input-thick" type="text" name="WP_DB_PASSWORD"
                                               value="" placeholder="Type Your password">
                                    </div>
                                </td>

                                <td></td>
                            </tr>

                            <div class="row p-1 m-auto">

                                  <div class="col-4">
                                      <div class="form-group m-5">
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                              Update Database Credentials</button>
                                      </div>

                                      <div class="form-group m-5">
                                          <a href="{{ route('admin.settings.database.migration', 1) }}" class="btn btn-success"><i class="fa fa-check-circle"></i>
                                              Import Data</a>
                                      </div>
                                  </div>

                                <div class="col-8 bg-dark rounded p-1">
                                    <h6>Requirements:</h6>
                                    <p class="text-bold">
                                        PHP > 7.3
                                        <br>
                                        Change max_input_time in "php.ini" file to 1200 sec.
                                        <br>
                                        Update New Database credentials in env file
                                    </p>
                                </div>
                            </div>

                        </tbody>
                    </table><!-- end of table -->

                </div>
            </div>

        </form>

    </div>
@stop
