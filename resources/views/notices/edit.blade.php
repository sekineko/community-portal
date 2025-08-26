<x-app-layout>
  <div class="w-full max-w-2xl mx-auto p-6 bg-white shadow-md md:my-4">
    <h2 class="text-xl text-primary font-bold mb-4 underline underline-offset-4">お知らせ編集</h2>
    <form action="{{ route('notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">タイトル<span class="text-red-400">（必須）</span></label>
          <input type="text" id="title" name="title" value="{{ old('title', $notice->title) }}" required
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          @error('title')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">内容<span class="text-gray-400">（任意）</span></label>
          <textarea id="content" name="content" rows="5"
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content', $notice->content) }}</textarea>
          @error('content')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <!-- 画像 -->
      <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">画像</label>
          <input type="file" id="image" name="image" accept="image/*"
              class="w-full border-gray-300 rounded-md shadow-sm">
          
          <!-- 現在の画像を表示 -->
          @if ($notice->image_path)
              <div class="mt-2">
                  <p class="text-sm text-gray-600">現在の画像:</p>
                  <img src="{{ asset('storage/' . $notice->image_path) }}" alt="現在の画像" class="w-40 rounded-md shadow">
              </div>
          @endif
          @error('image')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>

      <!-- PDF -->
      <div class="mb-4">
          <label for="pdf" class="block text-sm font-medium text-gray-700">PDFファイル</label>
          <input type="file" id="pdf" name="pdf" accept=".pdf"
              class="w-full border-gray-300 rounded-md shadow-sm">
          
          <!-- 現在のPDFを表示 -->
          @if ($notice->pdf_path)
              <div class="mt-2">
                  <p class="text-sm text-gray-600">現在のPDF: 
                      <a href="{{ asset('storage/' . $notice->pdf_path) }}" target="_blank" class="text-blue-500 hover:underline">
                          {{ basename($notice->pdf_path) }}
                      </a>
                  </p>
              </div>
          @endif
          @error('pdf')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="flex justify-end">
          <button type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
              更新
          </button>
      </div>
    </form>
    <div class="text-center mt-8">
      <a href="/notices/admin" class="text-blue-500 underline text-xl">戻る</a>
    </div>
  </div>
</x-app-layout>
