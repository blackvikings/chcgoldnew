@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                   <h4 class="card-title">Roles</h4> 
                </div>
                <div class="card-body">
                    @can('roles')<a class="btn btn-primary" style="float: right;" href="{{ route('roles-create') }}">Create</a> @endcan
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="td-actions text-left">
                                            @can('roles-update')
                                                <a href="{{ route('roles.update.view', $role->id ) }}" class="btn btn-success btn-round"><i class="material-icons">edit</i></a>
                                                &nbsp;
                                            @endcan
                                            @can('roles-delete')
                                                <form method="POST" action="{{ route('roles.delete', $role->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="_submit" class="btn btn-danger btn-round" title="Delete" value="reload_datatables" data-confirm>
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            @endcan
                                            &nbsp;
                                            @can('roles-permissions')    
                                                <a href="{{ route('assign', $role->slug ) }}" class="btn btn-success btn-round"><i class="material-icons">add_to_queue</i></a>
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
