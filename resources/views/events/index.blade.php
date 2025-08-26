<x-app-layout>
  <div class="w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4 min-h-[500px]">
    <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">行事予定</h2>

    <!-- 行事予定リスト -->
    <div class="overflow-x-auto">
      <table class="table-auto w-full text-left border-collapse">
        <tbody>
          @forelse ($events as $event)
          <tr class="bg-white border-b flex flex-col md:table-row py-4">
            <!-- 日付と時間 -->
            <td class="px-2 md:px-4 py-2 text-lg">
              <div class="flex justify-evenly cursor-pointer" onclick="openModal({{ $event->id }})">
                @php
                    $date = \Carbon\Carbon::parse($event->date);
                    $dayOfWeek = $date->dayOfWeek; // 0: 日曜日, 6: 土曜日
                    $dayColor = ($dayOfWeek === 0) ? 'text-red-500' : (($dayOfWeek === 6) ? 'text-blue-500' : '');
                @endphp

                <div>
                    {{ $date->locale('ja')->isoFormat('M月D日') }}
                    <span class="{{ $dayColor }}">
                        （{{ $date->isoFormat('ddd') }}）
                    </span>
                </div>
                <div>
                  @if ($event->start_time && $event->end_time)
                  {{ \Carbon\Carbon::parse($event->start_time)->format('G:i') }} ~ {{ \Carbon\Carbon::parse($event->end_time)->format('G:i') }}
                  @elseif ($event->start_time)
                    {{ \Carbon\Carbon::parse($event->start_time)->format('G:i') }} ~ 未定
                  @elseif ($event->end_time)
                    未定 ~ {{ \Carbon\Carbon::parse($event->end_time)->format('G:i') }}
                  @else
                    時間未定
                  @endif
                </div>
              </div>
            </td>

            <!-- イベントタイトルと詳細ボタン -->
            <td class="px-2 md:px-4 py-2 text-lg">
              <div class="w-full cursor-pointer flex items-center justify-center" onclick="openModal({{ $event->id }})">
                <span class=" hover:underline inline-block max-w-[260px] md:max-w-xs truncate">
                  {{ $event->title }}
                </span>
                <!-- アイコンを追加 -->
                <span class="material-symbols-outlined text-primary">chevron_right</span>
              </div>

              <!-- モーダル -->
              <div id="modal-{{ $event->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white p-6 rounded-md shadow-md w-11/12 max-w-lg sm:w-4/5 md:w-1/2">
                  <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $event->title }}</h2>
                  <p class="text-base text-gray-500 mb-4">
                    {{ \Carbon\Carbon::parse($event->date)->locale('ja')->isoFormat('YYYY年M月D日（ddd）') }}
                    (
                    @if ($event->start_time && $event->end_time)
                      {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} ~ {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                    @elseif ($event->start_time)
                      {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} ~ 未定
                    @elseif ($event->end_time)
                      未定 ~ {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                    @else
                      時間未定
                    @endif
                    )
                  </p>
                  <p class="text-lg text-gray-600 mb-4">場所: {{ $event->location }}</p>
                  <p class="text-lg text-gray-600">{!! nl2br(e($event->content)) !!}</p>
                  <div class="text-right mt-4">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-xs md:text-sm" onclick="closeModal({{ $event->id }})">
                      閉じる
                    </button>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="px-4 py-2 text-gray-600 text-sm md:text-base">現在行事予定はありません。</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    function openModal(id) {
      document.getElementById(`modal-${id}`).classList.remove('hidden');
    }

    function closeModal(id) {
      document.getElementById(`modal-${id}`).classList.add('hidden');
    }
  </script>
</x-app-layout>
