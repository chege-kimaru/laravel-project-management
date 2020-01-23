<div class="card">
    <div class="card-header">
        <h4>Comments</h4>
    </div>
    <div class="card-body">
        <ul class="media-list">
            @foreach($comments as $comment)
            <li class="media">
                <div class="media-body">
                <p>
                    <a href="/users/{{$comment->user->id}}">
                    {{$comment->user->name}} - {{$comment->user->email}}</a> 
                    <br>
                    <small>Commented on {{$comment->created_at}}</small>
                </p>
                    <p>{{$comment->body}}</p>
                    <b>Proof:</b>   
                    <p>{{$comment->url}}</p>
                </div>
            </li>
            <hr>
            @endforeach
        </ul>
    </div>
</div>