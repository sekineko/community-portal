<x-app-layout>
  <div class="w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4">
    <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">公開資料管理</h2>
    
    @if (session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    <div class="mb-4 flex justify-end">
      <a href="{{ route('documents.create') }}" 
          class="mr-6 px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        新規作成
      </a>
    </div>

    @if ($documents->isEmpty())
      <p class="text-gray-600">登録されたPDFがありません。</p>
    @else
      <table class="table-auto w-full text-left">
        <tbody>
          @foreach ($documents as $document)
            <tr class="border-b">
              <td class="px-4 py-2 text-lg md:text-base">
                <a href="{{ asset('storage/' . $document->file_path) }}"
                   class="text-blue-500 hover:underline"
                   onmousedown="window.innerWidth >= 1024 && (this.target = '_blank');">
                  {{ $document->title }}
                </a>
              </td>
              <td class="px-4 py-2 text-center">
                <div class="w-full flex flex-wrap md:flex-nowrap justify-end items-center flex-col md:flex-row">
                    <a href="{{ route('documents.edit', $document->id) }}" class="m-2 w-[60px] h-[36px] bg-yellow-500 text-white flex items-center justify-center rounded hover:bg-yellow-600 text-sm md:text-base">
                        編集
                    </a>
                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-2 w-[60px] h-[36px] bg-red-500 text-white flex items-center justify-center rounded hover:bg-red-600 text-sm md:text-base">
                            削除
                        </button>
                    </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
    <div class="text-center mt-8">
      <a href="/dashboard" class="text-blue-500 underline text-lg">戻る</a>
    </div>
  </div>
</x-app-layout>
