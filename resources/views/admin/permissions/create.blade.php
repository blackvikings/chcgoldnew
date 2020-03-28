@extends('layouts.app')
@push('css')
<style type="text/css">
    textarea 
    {
        height: auto !important;
        resize: none;
        line-height: 0.8 !important;
    }
</style>
@endpush
@section('content')
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Permissons </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('permission.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required="required" id="name">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group bmd-form-group">
                                    <label for="description" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection