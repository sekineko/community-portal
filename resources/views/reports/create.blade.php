<x-app-layout>
  <div class="w-full max-w-2xl mx-auto p-6 bg-white shadow-md md:my-4">
    <h2 class="text-xl text-primary font-bold mb-4 underline underline-offset-4">活動報告作成</h2>
    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
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
          <label for="date" class="block text-sm font-medium text-gray-700 mb-1">日付<span class="text-red-400">（必須）</span></label>
          <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required
              class="w-full max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          @error('date')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">内容<span class="text-red-400">（必須）</span></label>
          <textarea id="content" name="content" required rows="5"
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
          @error('content')
            <div style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700 mb-1">画像</label>
          <input type="file" id="image" name="image" accept="image/*"
              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
          @error('image')
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
      <a href="/reports/admin" class="text-blue-500 underline text-lg">戻る</a>
    </div>
  </div>
</x-app-layout>
