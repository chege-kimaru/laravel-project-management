@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white; padding:10px;">
    <h1>Create new company</h1>
    <div class="row col-md-12 col-lg-12 col-sm-12">
       <form action="{{route('companies.store')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="post">
            <div class="form-group">
                <label for="company-name">Name <span class="required">*</span></label>
                <input 
                    placeholder="Enter name"
                    id="company-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control">
            </div>
            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea 
                    placeholder="Enter description"
                    style="resize: vertical"
                    id="company-content"
                    required
                    name="description"
                    spellcheck="false"
                    rows="5"
                    class="form-control autosize-target text-left">
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
       </form>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/companies">All Companies</a></li>
        </ol>
    </div>
</div>

@endsection