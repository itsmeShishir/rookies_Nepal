@extends('admin.layouts.master')
@section('title', 'view-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="header-title">
                <h1>Categories</h1>
                <small>Categories List</small>
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
                                <a href="{{ url('/admin/add-category') }}">
                                    <h4>Add Category</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{ url('/admin/add-category') }}"> <i
                                            class="fa fa-plus"></i> Add Category
                                    </a>
                                </div>

                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>ID</th>
                                            <th>Parent Id</th>
                                            <th>Name</th>
                                            <th>Url</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)

                                            <tr>
                                                <td>{{ $cat->id }}</td>
                                                <td>{{ $cat->parent_id }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->url }}</td>
                                                <td>{{ $cat->description }}</td>



                                                <td>
                                                    <input type="checkbox" class="CategoryStatus btn btn-success"
                                                        rel="{{ $cat->id }}" data-toggle="toggle" data-on="Enabled"
                                                        data-off="Disabled" data-onstyle="success" data-offstyle="danger"
                                                        @if ($cat['status'] == '1')
                                                    checked
                                        @endif>
                                        <div id="myElem" style="display: none" class="alert alert-success">Status Enabled
                                        </div>
                                        </td>

                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/edit-category/' . $cat->id) }}"
                                                class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ url('/admin/delete-category/' . $cat->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
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
            <!-- customer Modal1 -->
        </section>
        <!-- /.content -->
    </div>
@endsection
