<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Recruitment</title>
    </head>
    <body>
        <form action="/recruitments/{{ $recruitment->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="user_id">
                <input type="hidden" id="user_id" name="recruitment[user_id]" value="{{ Auth::id() }}" >
            </div>
            <div class="recruitment_contents">
                <label for="recruitment_contents">募集内容</label>
                <input type="text" id="recruitment_contents" name="recruitment[recruitment_contents]" value="{{ $recruitment->recruitment_contents}}" placeholder="○○募集しています！　一緒に○○しませんか？　など" value="{{ old('recruitment.recruitment_contents') }}">
                <p class="recruitment_contents_error" style="color:red">{{ $errors->first('recruitment.recruitment_contents') }}</p>
            </div>
            <div class="category">
                <label for="category">カテゴリー</label>
                <input type="text" id="category" name="recruitment[category]" value="{{ $recruitment->category }}" placeholder="勉強、ご飯　など" value="{{ old('recruitment.category') }}">
                <p class="category_error" style="color:red">{{ $errors->first('recruitment.category') }}</p>
            </div>
            <div class="conditions">
                <label for="conditions">条件</label>
                <input type="text" id="conditions" name="recruitment[conditions]" value="{{ $recruitment->conditions }}" placeholder="女子限定、○○学科　など" value="{{ old('recruitment.conditions') }}">
                <p class="conditions_error" style="color:red">{{ $errors->first('recruitment.conditions') }}</p>
            </div>
            <div class="class">
                <label for="class">場所</label>
                <input type="text" id="class" name="recruitment[class]" value="{{ $recruitment->class }}" placeholder="自習室、学食　など" value="{{ old('recruitment.class') }}">
                <p class="class_error" style="color:red">{{ $errors->first('recruitment.class') }}</p>
            </div>
            <input type="submit" value="編集する">
        </form>
    </body>
</html>