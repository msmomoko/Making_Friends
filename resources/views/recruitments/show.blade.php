@extends('layouts.app')

@section('content')
    
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
        <form action="/recruitments/{{ $recruitment->id }}" id="form_delete" method="POST">
            @csrf
            @method('DELETE')
            <input type='submit' style='display:none'>
            <button class="submit_btn" onclick="return deleteRecruitment(this);">削除</button>
        </form>
    @endif
    
    @forelse($recruitment->comments as $comment)
        <p class="comment">{!! nl2br(e($comment->comment)) !!}</p>
    @empty
        <p>コメントはまだありません</p>
    @endforelse

    <form action="/recruitments/{{ $recruitment->id }}/comment" method="POST">
        @csrf
        <textarea class="comment" name="comment" rows="4"></textarea>
        <p class="comment_error" style="color:red">{{ $errors->first('comment.comment') }}</p>

        <button type="submit">コメントする</button>
    </form>
        
    <script>
        function deleteRecruitment()
        {
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_delete').submit();
            }
        }
    </script>
@endsection