@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規募集</div>
                
                <div class="card-body">
                    @if(Auth::user())
                    <form action="/recruitments" method="POST">
                        @csrf
                        <div class="user_id">
                            <input type="hidden" id="user_id" name="recruitment[user_id]" value="{{ Auth::id() }}" >
                        </div>
                        
                        <!-- 募集内容 -->
                        <div class="form-group row">
                            <label for="recruitment_contents" class="col-sm-3 col-form-label text-md-right">募集内容</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="recruitment_contents" name="recruitment[recruitment_contents]" placeholder="○○募集しています！　一緒に○○しませんか？　など" value="{{ old('recruitment.recruitment_contents') }}">
                                <p class="recruitment_contents_error" style="color:red">{{ $errors->first('recruitment.recruitment_contents') }}</p>
                            </div>
                        </div>
                        
                        <!-- カテゴリー -->
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label text-md-right">カテゴリー</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category" name="recruitment[category]" placeholder="勉強、ご飯　など" value="{{ old('recruitment.category') }}">
                                <p class="category_error" style="color:red">{{ $errors->first('recruitment.category') }}</p>
                            </div>
                        </div>
                        
                        <!-- 条件 -->
                        <div class="form-group row">
                            <label for="conditions" class="col-sm-3 col-form-label text-md-right">条件</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="conditions" name="recruitment[conditions]" placeholder="女性限定、○○学科　など" value="{{ old('recruitment.conditions') }}">
                                <p class="conditions_error" style="color:red">{{ $errors->first('recruitment.conditions') }}</p>
                            </div>
                        </div>
                        
                        <!-- 場所 -->
                        <div class="form-group row">
                            <label for="class" class="col-sm-3 col-form-label text-md-right">場所</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="class" name="recruitment[class]" placeholder="自習室、学食　など" value="{{ old('recruitment.class') }}">
                                <p class="class_error" style="color:red">{{ $errors->first('recruitment.class') }}</p>
                            </div>
                        </div>
                        
                        <!-- ロケーション -->
                        <div class="form-group row">
                            <label for="location" class="col-sm-3 col-form-label text-md-right">ロケーション</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="location" name="recruitment[location]" placeholder="○○の近く　など" value="{{ old('recruitment.location') }}">
                                <p class="location_error" style="color:red">{{ $errors->first('recruitment.location') }}</p>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <input class="btn btn-primary" type="submit" value="募集する">
                        </div>
                    </form>
                    
                    @else
                    <p class='note'>募集にはログインが必要です</p>
                    <a href='/login'>新規登録・ログインはこちらから</a><br>
                    <a href='/recruitments'>募集一覧に戻る</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection