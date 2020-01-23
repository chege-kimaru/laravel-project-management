@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white; padding:10px">
    <h1>Create new Project</h1>
    <div class="row col-md-12 col-lg-12 col-sm-12">
       <form action="{{route('projects.store')}}" method="post">
            {{csrf_field()}}
            <input class="form-control" type="hidden" name="_method" value="post">

            @if($companies == null)
            <input class="form-control" type="hidden" name="company_id" value="{{$company_id}}">
            @endif

            <div class="form-group">
                <label for="project-name">Name <span class="required">*</span></label>
                <input 
                    placeholder="Enter name"
                    id="project-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control">
            </div>

            @if($companies != null)
            <div class="form-group">
                <label for="project-company">Company</label>
                <select name="company_id" id="project-company" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <label for="project-content">Description</label>
                <textarea 
                    placeholder="Enter description"
                    style="resize: vertical"
                    id="project-content"
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
            <li><a href="/projects">All projects</a></li>
        </ol>
    </div>
</div>

@endsection