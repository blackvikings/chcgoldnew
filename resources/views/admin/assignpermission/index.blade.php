@extends('layouts.app')
{{-- @php print_r($permissions->toArray());die; @endphp --}}
@push('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
@endpush
@section('content')
<div class="content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Roles and Permission</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row">
                        <div class="col-md-2">
                            <label for="role">Role</label>
                                <h5>{{ $role->name }}</h5>
                                <input type="text" style="display: none" value="{{ $role->id }}" id="role-id">
                            </select>
                        </div>
                        <div class="col-md-10">
                            <table class="table table-striped" id="permission_table">
                                <thead>
                                    <tr>
                                        <th>View</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @php $j = 0; @endphp
                                    @foreach($permissions as $permission)
                                            @if($i == 0)
                                                <tr>
                                            @endif
                                                    <td>
                                                        <input type="checkbox" onchange="assign(this);"     
                                                        @foreach($permission->roles as $rol)
                                                            @if($rol->id == $role->id )
                                                                        checked="checked" 
                                                            @endif 
                                                        @endforeach
                                                         value="{{ $permission->id }}"> {{ $permission->name }}&nbsp;<sup><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $permission->description }}"></i></sup>
                                                    </td>
                                            @if($i == 3)
                                                </tr>
                                                @php $i = 0; @endphp
                                            @else 
                                                @php $i++; @endphp
                                            @endif
                                            @php $j++; @endphp
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

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });

    function assign(permission)
    {
        // console.log($permission);
        var permission_id = permission.value;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('permissions-assign') }}',
            data: {'permission_id': permission_id, 'role_id': {{ $role->id }} },
            success: function(html)
            {
                toastr.success(html);
            }
        });
    }
</script>
@endpush