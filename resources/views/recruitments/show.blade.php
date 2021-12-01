@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text">{{ $recruitment->user->name }}
                                <span class="text-muted">：{{ $recruitment->updated_at }}</span>
                            </p>
                        </div>
                        
                        <!-- 編集・削除機能 -->
                        <div class="col-4 row py-0 row justify-content-end">
                            @if(Auth::id() == $recruitment->user_id)
                                <!-- 編集機能 -->
                                <div class="mx-3">
                                    <a class="btn btn-primary" href='/recruitments/{{ $recruitment->id }}/edit' role="button">編集</a>
                                </div>
                                
                                <!-- 削除機能 -->
                                <form action="/recruitments/{{ $recruitment->id }}" id="form_delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return deleteRecruitment(this);">削除</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- 募集表示 -->
                <div class="row justify-content-center">
                    <div class="card  col-md-11 my-2 px-5">
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3 text-md-right">募集内容：</dt>
                                <dd class="col-sm-9">{{ $recruitment->recruitment_contents }}</dd>
                                
                                <dt class="col-sm-3 text-md-right">カテゴリー：</dt>
                                <dd class="col-sm-9">{{ $recruitment->category }}</dd>
                                
                                <dt class="col-sm-3 text-md-right">条件：</dt>
                                <dd class="col-sm-9">{{ $recruitment->conditions }}</dd>
                                
                                <dt class="col-sm-3 text-md-right">場所：</dt>
                                <dd class="col-sm-9">{{ $recruitment->class }}</dd>
                                
                                <dt class="col-sm-3 text-md-right">ロケーション：</dt>
                                <dd class="col-sm-9">{{ $recruitment->location }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            
                <!-- コメント機能 -->
                <div class="mt-5 mx-5">
                    <h5>-- コメント一覧 --</h5>
                    
                    <!-- コメント一覧表示 -->
                    @forelse($recruitment->comments as $comment)
                        <i class="fas fa-user"></i>
                        <small>{{ $comment->user->name }}：{{ $comment->created_at }}</small>
                        <div class="ml-3">
                            <p class="border-bottom mb-4">{!! nl2br(e($comment->comment)) !!}</p>
                        </div>
                    @empty
                        <p>コメントはまだありません</p>
                    @endforelse
                    
                    <!-- コメントフォーム -->
                    <form action="/recruitments/{{ $recruitment->id }}/comment" method="POST">
                        <div class="form-group">
                            @csrf
                            <textarea class="form-control" name="comment" placeholder="コメントを追加" rows="3"></textarea>
                            <p class="comment_error" style="color:red">{{ $errors->first('comment.comment') }}</p>
                            
                            <button type="submit" class="btn btn-secondary btn-sm">コメントする</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>


@endsection