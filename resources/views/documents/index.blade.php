<x-app-layout>
  <div class="w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4 min-h-[500px]">
    <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">公開資料</h2>
    @if ($documents->isEmpty())
      <p class="text-gray-600">登録されたPDFがありません。</p>
    @else
      <table class="table-auto w-full text-left">
        <tbody>
          @foreach ($documents as $document)
            <tr class="border-b flex flex-col md:table-row">
              <td class="px-4 py-1 md:py-2 text-lg md:text-base">
                <a href="{{ asset('storage/' . $document->file_path) }}" 
                   class="text-blue-500 hover:underline"
                   onmousedown="window.innerWidth >= 1024 && (this.target = '_blank');">
                  {{ $document->title }}
                </a>
              </td>
              <td class="px-4 md:py-2 text-sm md:text-base">
                  （{{ \Carbon\Carbon::parse($document->updated_at)->format('Y年m月d日') }} 更新）
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</x-app-layout>
