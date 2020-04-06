<div class="text-right text-nowrap">

    @can('Update Categories')
        <a href="{{ route('admin.categories.update', $category->id) }}" class="btn btn-link text-secondary p-1" title="Update"><i class="fal fa-lg fa-edit"></i></a>
    @endcan
    @can('Delete Categories')
        <form method="POST" action="{{ route('admin.categories.delete', $category->id) }}" class="d-inline-block" novalidate data-ajax-form>
            @csrf
            @method('DELETE')
            <button type="submit" name="_submit" class="btn btn-danger btn-round" title="Delete" value="reload_datatables" data-confirm>
                {{-- <i class="fal fa-lg fa-trash-alt"></i> --}}
                <i class="material-icons">close</i>
            </button>
        </form>
    @endcan
</div> 