@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9 pull-left">
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div>
    <a href="/projects/create/{{$company->id}}" class="btn btn-primary pull-right">Add project</a>
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; padding:10px">
        
        @foreach($company->projects as $project)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->description}}</p>
            <p><a href="/projects/{{$project->id}}" class="btn btn-primary" role="button">View Project</a></p>
        </div>
        @endforeach
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/companies">All Companies</a></li>
            <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
            <li><a href="/projects/create/{{$company->id}}">Add project</a></li>
            <li><a href="/companies/create">Create new company</a></li>
            <li>
                <a 
                    href="#"
                    onclick="
                        var result = confirm('Are you sure you want to delete this company?');
                        if(result) {
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }"
                >
                Delete
                </a>
                <form id="delete-form" action="{{route('companies.destroy', [$company->id])}}" method="post"
                style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                </form>
            </li>
        </ol>
    </div>
</div>

@endsection