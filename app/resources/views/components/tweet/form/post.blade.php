@auth()
    <div class="p-4">
        <p>投稿フォーム</p>
        <form action="{{ route('tweet.create')  }}" method="post">
            @csrf
            <textarea placeholder="つぶやきを入力" name="tweet" class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2">
            </textarea>
            <span>140まで</span>
            @error('tweet')
            <x-alert.error>{{  $message }} </x-alert.error>
            @enderror
            <div class="flex flex-wrap justify-end">
                <x-element.button>呟く</x-element.button>
            </div>
        </form>
    </div>
@endauth
@guest
    <div class="flex flex-wrap justify-center">
        <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
            <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
            <x-element.button-a :href="route('register')">会員登録</x-element.button-a>
        </div>
    </div>
@endguest
