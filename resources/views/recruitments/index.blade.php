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
                    <p class='recruitment_contents'>{{ $recruitment->recruitment_contents }}</p>
                    <p class='category'>{{ $recruitment->category }}</p>
                    <p class='conditions'>{{ $recruitment->conditions }}</p>
                    <p class='class'>{{ $recruitment->class }}</p><br>
                </div>
            @endforeach
        </div>
    </body>
</html>