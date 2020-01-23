@extends('layouts.app')
@section('content')
<div class="col-sm-6 col-lg-6 col-md-offset-6 col-lg-offset-6">
    <div class="card">
        <div class="card-header">projects <a class="btn btn-primary pull-right btn-sm"
         href="/projects/create">Create new</a></div>
        <div class="card-body">
            <ul class="list-group">
            @foreach($projects as $project)
            <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
            @endforeach  
            </ul>
        </div>
    </div>
</div>
@endsection