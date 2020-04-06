@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                   <h4 class="card-title"> Categories </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @can('create-category')
                                <a class="btn btn-primary" style="float: right;" href="{{ route('create.term') }}">Create</a> 
                            @endcan
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">   
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td class="td-actions text-left">
                                            @can('update-category')
                                                <a href="{{ route('edit.term', $category->id ) }}" class="btn btn-success btn-round"><i class="material-icons">edit</i></a>
                                                &nbsp;
                                            @endcan
                                            @can('delete-category')
                                                <form method="POST" action="{{ route('delete.term', $category->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="_submit" class="btn btn-danger btn-round" title="Delete" value="reload_datatables" data-confirm>
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            @endcan
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
