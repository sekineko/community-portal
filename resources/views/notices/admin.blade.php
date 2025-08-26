<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white md:my-4 shadow-md">
        <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">お知らせ管理</h2>

        <!-- メッセージ表示 -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- 新規作成リンク -->
        <div class="mb-4 text-right">
            <a href="{{ route('notices.create') }}" class="mr-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                新規作成
            </a>
        </div>

        <!-- 管理画面 -->
        <table class="table-auto w-full text-left">
            <tbody>
                @forelse ($notices as $notice)
                <tr class="bg-white border-b">
                    <td class="px-4 py-2 text-sm md:text-base">{{ $notice->title }}</td>
                    <td class="px-4 py-2 text-sm md:text-base text-right">
                        <div class="w-full flex flex-wrap md:flex-nowrap justify-end items-center flex-col md:flex-row">
                            <a href="{{ route('notices.edit', $notice->id) }}" class="m-2 w-[60px] h-[36px] bg-yellow-500 text-white flex items-center justify-center rounded hover:bg-yellow-600 text-sm md:text-base">
                                編集
                            </a>
                            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-2 w-[60px] h-[36px] bg-red-500 text-white flex items-center justify-center rounded hover:bg-red-600 text-sm md:text-base">
                                    削除
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-2 text-gray-600 text-sm md:text-base">お知らせがありません。</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- ページネーション -->
        <div class="mt-6">
            {{ $notices->links() }}
        </div>

        <div class="text-center mt-8">
            <a href="/dashboard" class="text-blue-500 underline text-lg">戻る</a>
        </div>
    </div>
</x-app-layout>
