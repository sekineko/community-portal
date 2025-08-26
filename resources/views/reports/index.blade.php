<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-primary_light shadow-md md:my-4 min-h-[500px]">
        <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">活動報告</h2>
        <!-- 一覧表示 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($reports as $report)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if ($report->image_path)
                <img src="{{ Storage::url($report->image_path) }}" alt="{{ $report->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-xl">写真なし</span>
                </div>
                @endif
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2">{{ $report->title }}</h2>
                    <p class="text-sm text-gray-500 mb-2">{{ \Carbon\Carbon::parse($report->date)->format('Y年m月d日') }}</p>
                    <!-- 本文（2行表示＋詳細展開） -->
                    <div x-data="{ expanded: false }">
                        <p class="text-gray-700 line-clamp-2" :class="{ 'line-clamp-none': expanded }">
                            {!! nl2br(e($report->content)) !!}
                        </p>
                        <button @click="expanded = !expanded" class="text-blue-500 hover:underline text-sm mt-2">
                            <span x-show="!expanded">詳細を見る</span>
                            <span x-show="expanded">閉じる</span>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-600">活動報告がありません。</p>
            @endforelse
        </div>
        <!-- ページネーション -->
        <div class="mt-6">
            {{ $reports->links() }}
        </div>
    </div>
</x-app-layout>
