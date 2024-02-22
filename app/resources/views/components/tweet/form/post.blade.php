@auth()
    <div class="p-4">
        <p>投稿フォーム</p>
        <div class="flex justify-around items-center w-full" x-data="{ toggle : false}">
            <button x-on:click=" toggle = !toggle " class="font-display p-2 m-5 bg-blue-300 rounded">button</button>
            <h1 x-bind:class="! toggle ? 'text-red-300' : 'text-blue-300'">text</h1>
        </div>
        <form action="{{ route('tweet.create')  }}" method="post" enctype="multipart/form-data">
            @csrf
            <textarea placeholder="つぶやきを入力" name="tweet" class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2">
            </textarea>
            <span>140まで</span>
            <x-tweet.form.image></x-tweet.form.image>
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
