@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    @can('product_list')
                    <a class="btn btn-success float-right" href="{{ route('admin/products') }}" style="color: #fff"> Manage Products</a>

                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Products</h6>
                                    <h1 class="display-4">6</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">
                                    <div class="rotate">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Users</h6>
                                    <h1 class="display-4">2</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-info">
                                    <div class="rotate">
                                        <i class="fa fa-twitter fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Categories</h6>
                                    <h1 class="display-4">10</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                    <div class="rotate">
                                        <i class="fa fa-share fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Images</h6>
                                    <h1 class="display-4">36</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
