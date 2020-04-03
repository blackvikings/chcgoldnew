@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Description</div>

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
                    <form method="POST" action="{{ route('create.tag') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <label for="title" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" value="{{ old('name') }}" id="ssname" class="form-control">
                                <input type="hidden" name="type" value="tag">
                            </div>
                        </div>    
                        <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}" readonly="readonly" required="required" class="form-control">
                        <div class="form-group row mb-0 mt-2">
                            <label for="name" class="col-md-2 col-form-label">Type</label>
                            <div class="col-md-8">
                                <select name="type" class="form-control" required="required">
                                    <option @if (old('type') == 'visible tag') selected="selected" @endif value="visible tag">Visible tag</option>
                                    <option @if (old('type') == 'hidden tag') selected="selected" @endif value="hidden tag">Hidden tag</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <label for="name" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-8">
                                <label class="switch">
                                  <input type="checkbox" @if(old('status') == 'Active') checked="checked" @endif name="status" value="Active">
                                  <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="text-left text-md-right pb-1">
                            <button type="submit" name="_submit" class="btn btn-primary mb-2" value="reload_page">Save</button>
                            <button type="submit" name="_submit" class="btn btn-primary mb-2" value="redirect">Save &amp; Go Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function(){
        $('#ssname').keyup(function(){
                // console.log($(this).val());
                $slug = slugify($(this).val());
                $('#slug').val($slug);
        })
    })
    function slugify(text) {
            // https://gist.github.com/mathewbyrne/1280286
            return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '')             // Trim - from end of text
            .replace(/[\s_-]+/g, '-');
    }
    function myFunction() {
          var x = document.getElementById("myDIV");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }
</script>
@endpush