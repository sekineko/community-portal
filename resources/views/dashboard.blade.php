<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4">
        <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">管理ダッシュボード</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <!-- スライド管理 -->
            <a href="{{ route('slides.admin') }}" class="bg-purple-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-purple-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">photo_library</span>
                    </div>
                    <div>スライド管理</div>
                </div>
            </a>

            <!-- お知らせ管理 -->
            <a href="{{ route('notices.admin') }}" class="bg-blue-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-blue-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">feedback</span>
                    </div>
                    <div>お知らせ管理</div>
                </div>
            </a>

            <!-- 行事予定管理 -->
            <a href="{{ route('events.admin') }}" class="bg-green-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-green-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">event_available</span>
                    </div>
                    <div>行事予定管理</div>
                </div>
            </a>

            <!-- 活動報告管理 -->
            <a href="{{ route('reports.admin') }}" class="bg-yellow-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-yellow-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">local_activity</span>
                    </div>
                    <div>活動報告管理</div>
                </div>
            </a>

            <!-- 公開資料管理 -->
            <a href="{{ route('documents.admin') }}" class="bg-orange-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-orange-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">description</span>
                    </div>
                    <div>公開資料管理</div>
                </div>
            </a>

            @if(Auth::check() && Auth::user()->role === 'root')
            <!-- ユーザー管理（root のみ表示）-->
            <a href="{{ route('users.admin') }}" class="bg-red-500 text-white px-6 py-4 rounded-md text-center shadow hover:bg-red-600 flex items-center justify-center">
                <div>
                    <div>
                        <span class="material-symbols-outlined text-6xl">group</span>
                    </div>
                    <div>ユーザー管理</div>
                </div>
            </a>
            @endif

        </div>
        <div class="text-center mt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-blue-500 underline text-lg">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
