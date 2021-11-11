<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Recruitment</title>
    </head>
    <body>
        <a href='/recruitments/create'>募集する</a>
        <div class='recruitments'>
            @foreach ($recruitments as $recruitment)
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
            @endforeach
        </div>
        <script>
            function deleteRecruitment()
            {
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>