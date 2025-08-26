<x-app-layout>
  <div class="w-full max-w-2xl mx-auto p-6 bg-white shadow-md md:my-4">
    <h2 class="text-xl text-primary font-bold mb-4 underline underline-offset-4">公開資料登録</h2>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">タイトル<span class="text-red-400">（必須）</span></label>
          <input type="text" id="title" name="title" value="{{ old('title') }}" required
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          @error('title')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-4">
          <label for="file" class="block text-sm font-medium text-gray-700 mb-1">PDFファイル<span class="text-red-400">（必須）</span></label>
          <input type="file" id="file" name="file" accept=".pdf" required
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          @error('file')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="flex justify-end">
          <button type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
              登録
          </button>
      </div>
    </form>
    <div class="text-center mt-8">
      <a href="{{ route('documents.admin') }}" class="text-blue-500 underline text-lg">戻る</a>
    </div>
  </div>
</x-app-layout>
