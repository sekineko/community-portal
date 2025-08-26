<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4">
        <h2 class="text-xl text-primary font-bold mb-4 underline underline-offset-4">スライド作成</h2>

        <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 表示順 -->
            <div class="mb-4">
                <label for="order" class="block text-sm font-medium text-gray-700 mb-1">
                    表示順<span class="text-gray-400">（空欄の場合は最後尾に追加されます）</span>
                </label>
                <input type="number" id="order" name="order" 
                    value="{{ old('order') !== null ? old('order') : '' }}" 
                    class="border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="1">
                @error('order')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- 画像 -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                    画像（JPG/PNG/GIF, 最大5MB）<span class="text-red-400">（必須）</span>
                </label>
                <input type="file" id="image" name="image" accept="image/*" required
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('image')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- PR文 -->
            <div class="mb-4">
                <label for="pr_text" class="block text-sm font-medium text-gray-700 mb-1">
                    PR文<span class="text-red-400">（必須）</span>
                </label>
                <textarea id="pr_text" name="pr_text" rows="3" required
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('pr_text') }}</textarea>
                @error('pr_text')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- ボタン -->
            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    登録
                </button>
            </div>
        </form>

        <div class="text-center mt-8">
            <a href="{{ route('slides.admin') }}" class="text-blue-500 underline text-lg">戻る</a>
        </div>
    </div>
</x-app-layout>
