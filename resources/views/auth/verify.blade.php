@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メール認証') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('あなたのメールアドレスに新しい認証リンクが送信されました。') }}
                        </div>
                    @endif

                    {{ __('先に進む前に、確認用のリンクをメールで確認してください。') }}
                    {{ __('もし認証用のメールを受け取っていない場合、') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('お問い合わせはこちらから') }}</button>。
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
