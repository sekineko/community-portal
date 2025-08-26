<x-app-layout>
  <div class="w-full max-w-5xl mx-auto p-4 bg-primary_light md:my-4">
    <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">お知らせ</h2>
    <!-- お知らせリスト -->
    <div x-data="{ expandedId: null }">
      @forelse ($notices as $notice)
      <div class="shadow-md bg-white rounded-md p-4 my-4">
          <div class="flex flex-col md:flex-row md:items-center">
            <h3 class="text-xl font-bold text-gray-800">{{ $notice->title }}</h3>
            <p class="text-sm text-gray-500 md:ml-4">({{ \Carbon\Carbon::parse($notice->created_at)->format('Y年m月d日') }})</p>
          </div>
          @if($notice->content)
          <div :class="{ 'line-clamp-1': expandedId !== {{ $notice->id }} }" class="mt-2 text-gray-700">
            {!! nl2br(e($notice->content)) !!}
          </div>
          @endif
          <div x-show="expandedId === {{ $notice->id }}">
              @if ($notice->image_path)
              <div class="my-2 md:m-4">
                <img src="{{ Storage::url($notice->image_path) }}" alt="{{ $notice->title }}" style="width: 100%; height: auto;">
              </div>
              @endif
              @if ($notice->pdf_path)
              <div class="m-4 flex justify-center">
                <a href="{{ asset('storage/' . $notice->pdf_path) }}" target="_blank" class="block">
                  <div class="w-[210px] h-[297px] bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 relative">
                    <!-- PDF サムネイル (1ページ目) -->
                    <canvas id="pdf-thumbnail-{{ $notice->id }}" class="pdf-thumbnail w-full h-full" data-pdf-url="{{ asset('storage/' . $notice->pdf_path) }}"></canvas>
                    
                    <!-- ホバー時のオーバーレイ -->
                    <div class="absolute inset-0 bg-black opacity-0 hover:opacity-10 transition-opacity duration-300"></div>
                    
                    <!-- ファイル名 (下部に表示) -->
                    <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-80 p-2">
                      <p class="text-gray-800 text-xs font-medium truncate">{{ basename($notice->pdf_path) }}</p>
                    </div>
                  </div>
                </a>
              </div>
              @endif
          </div>
          <button @click="expandedId = expandedId === {{ $notice->id }} ? null : {{ $notice->id }}" class="mt-2 text-blue-500 hover:underline">
              <span x-text="expandedId === {{ $notice->id }} ? '閉じる' : '詳細を見る'"></span>
          </button>
      </div>
      @empty
        <p class="text-gray-600">現在お知らせはありません。</p>
      @endforelse
    </div>
  </div>
</x-app-layout>
