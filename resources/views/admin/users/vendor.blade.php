@extends('admin.layouts.master')
@section('title', 'view-coupons')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="header-title">
                <h1>Vendors</h1>
                <small>Vendors List</small>
            </div>
        </section>
        @if (Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if (Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        <div id="message_success" style="display: none" class="alert alert-success">Status Enabled
        </div>
        <div id="message_error" style="display: none" class="alert alert-danger">Status Disabled
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">

                                <h4>Vendors Informations</h4>

                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{ url('/admin/vendor/register') }}"> <i
                                            class="fa fa-plus"></i> Add Vendor
                                    </a>
                                </div>

                            </div>
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="/export-vendor-list"> <i
                                            class="fa fa-bars"></i> Export Table Data
                                    </a>
                                </div>

                            </div>
                            
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Registered Date</th>
                                            <th>Status</th>
                                            <th>Products</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendors as $key => $vendor)
                                            <tr>
                                                <td>{{ $vendor->id }}</td>
                                                <td>{{ $vendor->name }}</td>
                                                <td>{{ $vendor->email }}</td>
                                                <td>{{ $vendor->phone }}</td>
                                                <td>{{ $vendor->address }}</td>
                                                <td>{{ $vendor->created_at }}</td>
                                                <td>
                                                    <input type="checkbox" class="VendorStatus btn btn-success"
                                                        rel="{{ $vendor->id }}" data-toggle="toggle" data-on="Enabled"
                                                        data-off="Disabled" data-onstyle="success" data-offstyle="danger"
                                                        @if ($vendor['status'] == '1')
                                                            checked>
                                                        @endif
                                                </td>
                                                <td>
                                                    <a href={{url('/admin/vendor/'.$vendor->id)}}>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
