@component('mail::message')
# 昨日は {{ $count }}件のつぶやきが追加されました。

{{ $toUser->name  }}さんこんにちは！

昨日は{{ $count }}件の呟きが追加されましたよ！見に来ましょう。

@component('mail::button', ['url' => route('tweet.index')])
    つぶやきを見に行く
@endcomponent

@endcomponent
