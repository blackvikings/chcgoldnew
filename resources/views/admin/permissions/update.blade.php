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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Permissons</h4>
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
                    <form action="{{ route('permission-update', $permission->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" name="name" required="required" value="{{ $permission->name }}" id="name">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group bmd-form-group">
                                    <label for="description" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="description" id="description"> {{ $permission->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger mb-2">Back</a>
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

{{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" name="name" required="required" value="{{ $permission->name }}" id="name">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group bmd-form-group">
                                    <label for="description" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="description" id="description"> {{ $permission->description }}</textarea>
                                </div>
                            </div>
</div> --}}