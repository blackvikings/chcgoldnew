@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                       <h4 class="card-title"> Permissons </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @can('permission-create') <a class="btn btn-primary" style="float: right;" href="{{ route('permission.create.view') }}">Create</a>@endcan
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($permissions as $permission) 
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td class="td-actions text-left">
                                                @can('permission-update')
                                                    <a href="{{ url('/permission-update/'.$permission->id ) }}" class="btn btn-success"><i class="material-icons">edit</i></a>
                                                @endcan
                                                    &nbsp;
                                                @can('permission-delete')
                                                    <form method="POST" action="{{ route('permission.delete', $permission->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" name="_submit" class="btn btn-danger" title="Delete" value="reload_datatables" data-confirm>
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
