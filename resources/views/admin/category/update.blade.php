@extends('layouts.app')
@push('css')
<style type="text/css">
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    margin-left: 10px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #9a33b2;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #9a33b2;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
@endpush
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
                    <form action="{{ route('update.term', $term->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group">
                                    <label for="title" class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" value="{{ $term->name }}" id="ssname" class="form-control">
                                        <input type="hidden" name="type" value="category">
                                </div>
                            </div>
                            <input type="hidden" name="slug" readonly="readonly" id="slug" value="{{ $term->slug }}" required="required" class="form-control">  

                            <div class="col-md-6"> 
                                <div class="form-group bmd-form-group">
                                    <label for="name">Status</label>
                                     <label class="switch">
                                      <input type="checkbox" name="status" @if($term->status == 'Active') checked="checked" @endif value="Active">
                                      <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <div class="form-group bmd-form-group">
                                    <label for="name">Is there a parent category?</label>
                                    <br>
                                    <input type="radio" name="parent_type" value="Yes" @if($term->parent_type == "Yes")
                                        checked="checked" 
                                    @endif onchange="myFunction('Yes')" ><span>Yes</span><br>
                                    <input type="radio" @if($term->parent_type == "No") checked="checked" @endif name="parent_type" value="No" onchange="myFunction('No')" ><span>No</span>
                                </div>
                            </div>
                            <div class="col-md-6" id="myDIV" style="display: none;">
                                <div class="form-group bmd-form-group">
                                    <select class="form-control" name="parent">
                                        <option selected="selected" disabled="disabled">SELECT</option>
                                        @foreach(app('App\Term')->orderBy('id')->where('parent', null)->where('type','category')->where('status', '=', 'Active')->get() as $model)
                                            <option @if ($term->parent == $model->id)
                                                selected="selected" 
                                            @endif value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="bmd-label-floating">Description</label>
                                    <textarea type="text" name="description" required="required" class="form-control">{{ $term->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div style="margin-right: 10px; float: right;">
                            <button type="submit" name="submit" class="btn btn-primary mb-2" value="reload_page">Save</button>
                            &nbsp;
                            <button type="submit" name="_submit" style="float: right; margin-left: 10px;" class="btn btn-primary mb-2" value="redirect">Save &amp; Go Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection


@push('scripts')    
@if($term->parent_type == "Yes")
    <script type="text/javascript">
        window.onload = function() {
            myFunction("Yes");
        };
    </script>
@endif
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
    function myFunction(val) {
        var x = document.getElementById("myDIV");
        if(val == 'Yes')
        {
            x.style.display = "block";
        }
        else
        {
           x.style.display = "none";
        }
    }
</script>
@endpush