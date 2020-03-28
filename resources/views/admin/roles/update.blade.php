@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Role</h4>
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
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" value="{{ $role->name }}" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group">
                                    <label for="slug" class="bmd-label-floating">Slug</label>
                                    <input type="text" class="form-control" value="{{ $role->slug }}" name="slug" id="slug">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label for="description" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="description" id="description">{{ $role->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger mb-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
