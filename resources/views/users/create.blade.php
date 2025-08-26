<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white md:my-4 shadow-md">
        <h2 class="text-xl font-bold text-primary mb-4 underline underline-offset-4">ユーザー作成</h2>

        <!-- メッセージ表示 -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- フォーム -->
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- 名前 -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">名前<span class="text-red-400">（必須）</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス<span class="text-red-400">（必須）</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- パスワード -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">パスワード<span class="text-red-400">（必須）</span></label>
                <input type="password" id="password" name="password" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- パスワード確認 -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">パスワード確認<span class="text-red-400">（必須）</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- 登録ボタン -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    登録
                </button>
            </div>
        </form>

        <div class="text-center mt-8">
            <a href="{{ route('users.admin') }}" class="text-blue-500 underline text-lg">戻る</a>
        </div>
    </div>
</x-app-layout>
