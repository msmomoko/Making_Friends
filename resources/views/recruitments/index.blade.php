@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        @foreach ($recruitments as $recruitment)
            <div class="col-6 mb-5">
                <div class="card">
                    
                    <div class="card-header">
                        <div class="row">
                            <p class="card-text">{{ $recruitment->user->name }}<small class="text-muted">：{{ $recruitment->updated_at }}</small></p>
                            
                            <!-- いいね機能 -->
                            @if($recruitment->users()->where('user_id', Auth::id())->exists())
                                <div class='unfavorite'>
                                    <form action="/recruitments/{{ $recruitment->id }}/unfavorites" id="unfavorites" method="POST">
                                        @csrf
                                        <input class="btn btn-success" type='submit' value="いいね">
                                    </form> 
                                </div>
                            @else
                                <div class='favorite'>
                                    <form action="/recruitments/{{ $recruitment->id }}/favorites" id="favorites" method="POST">
                                        @csrf
                                        <input class="btn btn-secondary" type='submit' value="いいね" value={{$recruitment->users()->count() }}>
                                    </form> 
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <!-- 募集一覧 -->
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">募集内容：</dt>
                            <dd class="col-sm-8 card-text">
                                <a href="/recruitments/{{ $recruitment->id }}">{{ $recruitment->recruitment_contents }}</a>
                            </dd>
                            
                            <dt class="col-sm-4 text-md-right">カテゴリー：</dt>
                            <dd class="col-sm-8 card-text">{{ $recruitment->category }}</dd>
                            
                            <dt class="col-sm-4 text-md-right">条件：</dt>
                            <dd class="col-sm-8 card-text">{{ $recruitment->conditions }}</dd>
                            
                            <dt class="col-sm-4 text-md-right">場所：</dt>
                            <dd class="col-sm-8 card-text">{{ $recruitment->class }}</dd>
                            
                            <dt class="col-sm-4 text-md-right">ロケーション：</dt>
                            <dd class="col-sm-8 card-text">{{ $recruitment->location }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection