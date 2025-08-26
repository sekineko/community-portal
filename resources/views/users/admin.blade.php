<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white md:my-4 shadow-md">
        <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">ユーザー管理</h2>

        <!-- メッセージ表示 -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- 新規作成リンク -->
        <div class="mb-4 text-right">
            <a href="{{ route('users.create') }}" class="mr-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                新規作成
            </a>
        </div>

        <!-- ユーザー一覧テーブル -->
        <table class="table-auto w-full text-left">
            <tbody>
                @forelse ($users as $user)
                <tr class="bg-white border-b">
                    <td class="px-4 py-2 text-sm md:text-base">
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex-1">{{ $user->name }}</div>
                            <div class="flex-1">{{ $user->email }}</div>
                        </div>
                    </td>
                    <td class="px-4 py-2 text-sm md:text-base">
                        <div class="flex justify-end">
                            @if ($user->role !== 'root')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-2 w-[60px] h-[36px] bg-red-500 text-white flex items-center justify-center rounded hover:bg-red-600 text-sm md:text-base">
                                    削除
                                </button>
                            </form>
                            @else
                            <div class="text-gray-400">（削除不可）</div>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-4 py-2 text-gray-600 text-sm md:text-base">登録されたユーザーがいません。</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="text-center mt-8">
            <a href="/dashboard" class="text-blue-500 underline text-lg">戻る</a>
        </div>
    </div>
</x-app-layout>
