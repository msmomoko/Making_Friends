@extends('layouts.app')

@section('content')
        <div class='recruitments'>
                <div class='recruitment'>
                    <small>{{ $recruitment->user->name }}</small>
                    <p class='recruitment_contents'>{{ $recruitment->recruitment_contents }}</p>
                    <p class='category'>{{ $recruitment->category }}</p>
                    <p class='conditions'>{{ $recruitment->conditions }}</p>
                    <p class='class'>{{ $recruitment->class }}</p>
                    <p class='location'>{{ $recruitment->location }}</p>
                </div>
                
                @if(Auth::id() == $recruitment->user_id)
                    <a href='/recruitments/{{ $recruitment->id }}/edit'>編集</a>
                    <form action="/recruitments/{{ $recruitment->id }}" id="form_delete" method="post">
                        @csrf
                        @method('DELETE')
                        <input type='submit' style='display:none'>
                        <button class="submit_btn" onclick="return deleteRecruitment(this);">削除</button>
                    </form>
                @endif
                
                @if($recruitment->users()->where('user_id', Auth::id())->exists())
                <div class='unfavorite'>
                    <form action="/recruitments/{{ $recruitment->id }}/unfavorites" id="unfavorites" method="post">
                        @csrf
                        <input type='submit' value="いいね取り消し">
                    </form> 
                </div>
                @else
                <div class='favorite'>
                    <form action="/recruitments/{{ $recruitment->id }}/favorites" id="favorites" method="post">
                        @csrf
                        <input type='submit' value="いいね" value={{$recruitment->users()->count() }}>
                    </form> 
                </div>
                @endif
        </div>
        <script>
            function deleteRecruitment()
            {
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
@endsection