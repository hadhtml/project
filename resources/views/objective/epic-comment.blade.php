@foreach($Comment as $comment)
@php
$user = DB::table('users')->where('id',$comment->user_id)->first();
$CommentReply = DB::table('epic_comment_reply')->where('comment_id',$comment->id)->get();

@endphp
<input type="hidden" class="comment_id" value="{{$comment->id}}">
<div class="col-md-12 col-lg-12 col-xl-12">
                        
    <div class="card comment-card" id="delete-comment{{$comment->id}}">
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <img class="user-image" src="https://images.unsplash.com/photo-1557862921-37829c790f19?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bWFufGVufDB8fDB8fHww" style="width:34px; height:34px; background-size:cover">
                        </div>
                        <div class="d-flex flex-column">
                            <div>
                                <h5>{{$user->name}}</h5>
                                <small>{{ \Carbon\Carbon::parse($comment->created_at)->format('d M, Y')}}, {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i A')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div class="pr-2">
                            <button class="btn-circle btn-tolbar" type="button" onclick="editcomment({{$comment->id}},'{{$comment->comment}}');">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                        </div>
                        <div>
                            <button class="btn-circle btn-tolbar" type="button" onclick="deleteepiccomment({{$comment->id}});">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="edit-c{{$comment->id}}">
                    <p>{{$comment->comment}}</p>
                </div>
                @foreach($CommentReply as $commentreply)
                @php
                $userR = DB::table('users')->where('id',$commentreply->user_id)->first();
                @endphp
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <img class="user-image" src="https://images.unsplash.com/photo-1557862921-37829c790f19?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bWFufGVufDB8fDB8fHww" style="width:34px; height:34px; background-size:cover">
                        </div>
                        <div class="d-flex flex-column">
                            <div>
                                <h5>{{$userR->name}}</h5>
                                <small>{{ \Carbon\Carbon::parse($commentreply->created_at)->format('d M, Y')}}, {{ \Carbon\Carbon::parse($commentreply->created_at)->format('H:i A')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                    
                    </div>
                </div>
                <div id="">
                    <p>{{$commentreply->reply}}</p>
                </div>
                @endforeach
                <div>
                    <button class="btn btn-default btn-sm" type="button" onclick="addepicreply({{$comment->id}},1);">Reply</button>
                </div>
            </div>
            <div class="mt-2 d-flex flex-row" id="epic-reply{{$comment->id}}">
            </div>  
        </div>
    </div>
</div>


@endforeach