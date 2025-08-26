<x-app-layout>
  <div class="content">
    <!-- Swiper -->
    <div class="swiper mySwiper w-full max-w-5xl bg-gray-200 mt-0 md:mt-4">
      <div class="swiper-wrapper">
        @foreach ($slides as $slide)         
        <div class="swiper-slide flex flex-col md:flex-row">
          <!-- 画像部分 -->
          <div class="w-full md:w-1/2 flex justify-center items-center">
            <img src="{{ asset('storage/' . $slide->image_path) }}" alt="Image 1" class="w-full">
          </div>
          <!-- テキスト部分 -->
          <div class="w-full md:w-1/2 flex justify-center items-center text-gray-800 p-4">
            <p class="text-lg px-8">
              {!! nl2br(e($slide->pr_text)) !!}
            </p>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Navigation buttons -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
          delay: 6000,
        },
        speed: 2000,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        autoHeight: false
      });
    </script>

    <style>
      /* Swiperのナビゲーションボタンを白にカスタマイズ */
      .swiper-button-next,
      .swiper-button-prev {
        color: white;
      }

      /* ホバー時のスタイル */
      .swiper-button-next:hover,
      .swiper-button-prev:hover {
        color: #f0f0f0;
      }

      /* ページネーションの丸（ドット）を白に設定 */
      .swiper-pagination-bullet {
        background-color: skyblue;
      }

      /* 現在アクティブなドットの色を変更 */
      .swiper-pagination-bullet-active {
        background-color: #007B88;
      }

      /* スライドのコンテンツを調整 */
      .swiper-slide {
        display: flex;
        flex-direction: column; /* デフォルトは縦並び */
        justify-content: center;
        align-items: center;
      }

      /* テキスト部分の高さを固定 */
      .swiper-slide > div:nth-child(2) {
        height: 100%;
        overflow-y: auto;
      }

      @media (min-width: 768px) {
        .swiper-slide {
          flex-direction: row; /* md以上は横並び */
        }
      }
    </style>

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
                      <canvas id="pdf-thumbnail-home-{{ $notice->id }}" class="pdf-thumbnail w-full h-full" data-pdf-url="{{ asset('storage/' . $notice->pdf_path) }}"></canvas>
                      
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
  </div>
</x-app-layout>
