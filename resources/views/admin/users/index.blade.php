@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">User</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @can('create-user') 
                                        <a class="btn btn-primary" style="float: right;" href="{{ route('create.user') }}">Create
                                        </a>
                                    @endcan 
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" >
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @can('role-assign')
                                                    <select class="form-control" onchange="assignrole(this.value,'{{ $user->id }}')">
                                                        <option selected="selected" disabled="disabled">SELECT</option>
                                                        @php $j = 0 @endphp
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                            @if(isset($user->roles[$j]) && $user->roles[$j]->id === $role->id)
                                                                        selected="selected" 
                                                            @endif
                                                                >{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endcan
                                                </td>
                                                <td class="td-actions text-left">
                                                @can('edit-user')
                                                    <a href="{{ route('edit-user', $user->id ) }}" class="btn btn-success"><i class="material-icons">edit</i></a>
                                                    &nbsp;
                                                @endcan
                                                @can('delete-user')
                                                    <form method="POST" action="{{ route('delete.user', $user->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
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
@endsection
@push('scripts')
<script type="text/javascript">
    
    function assignrole(role_id, user_id)
    {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('role-assign') }}',
            data: {'role_id': role_id, 'user_id': user_id },
            success: function(html)
            { 
                toastr.success(html);
            }
        });
    }
</script>
@endpush
            {{-- <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title">User</h4> 
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @can('create-user') 
                                <a class="btn btn-primary" style="float: right;" href="{{ route('create.user') }}">Create
                                </a>
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
                            <table class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @can('role-assign')
                                                <select class="form-control" onchange="assignrole(this.value,'{{ $user->id }}')">
                                                    <option selected="selected" disabled="disabled">SELECT</option>
                                                    @php $j = 0 @endphp
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                        @if(isset($user->roles[$j]) && $user->roles[$j]->id === $role->id)
                                                                    selected="selected" 
                                                        @endif
                                                            >{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @endcan
                                            </td>
                                            <td>
                                            @can('edit-user')
                                                <a href="{{ route('edit-user', $user->id ) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                &nbsp;
                                            @endcan
                                            @can('delete-user')
                                                <form method="POST" action="{{ route('delete.user', $user->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="_submit" class="btn btn-link text-secondary p-1" title="Delete" value="reload_datatables" data-confirm>
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
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
            </div> --}}
 