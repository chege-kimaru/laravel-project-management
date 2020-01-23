@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9 pull-left">
    <div class="jumbotron">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
    </div>
    <div class="container-fluid" style="background: white; padding:10px">
        @include('partials.comments')
        <form action="{{route('comments.store')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="commentable_type" value="App\Project">
            <input type="hidden" name="commentable_id" value="{{$project->id}}">
            <div class="form-group">
                <label for="comment-content">Comment</label>
                <textarea 
                    placeholder="Enter comment"
                    style="resize: vertical"
                    id="comment-content"
                    required
                    name="body"
                    spellcheck="false"
                    rows="3"
                    class="form-control autosize-target text-left">
                </textarea>
            </div>
            <div class="form-group">
                <label for="comment-content">Proof of work done (URL/photos)</label>
                <textarea 
                    placeholder="Enter url"
                    style="resize: vertical"
                    id="comment-content"
                    required
                    name="url"
                    spellcheck="false"
                    rows="2"
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
            <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
            <li><a href="/projects/create">Add project</a></li>
            <li><a href="/projects">My projects</a></li>
            <br>
            @if($project->user_id == Auth::user()->id)
            <li>
                <a 
                    href="#"
                    onclick="
                        var result = confirm('Are you sure you want to delete this project?');
                        if(result) {
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }"
                >
                Delete
                </a>
                <form id="delete-form" action="{{route('projects.destroy', [$project->id])}}" method="post"
                style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                </form>
            </li>
            @endif
        </ol>
        <hr>
        <h4>Add members</h4>
        <div class="row">
            <div class="col-sm-12">
            <form id="add-user" action="{{route('projects.adduser')}}" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="hidden" name="project_id" value="{{$project->id}}" class="form-control">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                           Add
                        </button>
                    </span>
                </div>
            </form>
            </div>
        </div>
        <br>
        <h4>Team members</h4>
        <ol class="list-unstyled">
            @foreach($project->users as $user)
            <li><a href="#">{{$user->email}}</a></li>
            @endforeach
        </ol>
    </div>
</div>

@endsection