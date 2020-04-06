@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Tags</h4> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @can('create-tag')
                                <a class="btn btn-primary" style="float: right;" href="{{ route('create.tag') }}">Create</a> 
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
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Type</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>{{ $tag->type }}</td>
                                            <td>{{ $tag->status }}</td>
                                            <td>
                                            @can('update-tag')
                                                <a href="{{ route('edit.tag', $tag->id ) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                &nbsp;
                                            @endcan
                                            @can('delete-tag')
                                                <form method="POST" action="{{ route('delete.tag', $tag->id) }}" onsubmit="return submitForm(this);" class="d-inline-block">
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
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@push('scripts')
    {{-- {!! $html->scripts() !!} --}}
@endpush
