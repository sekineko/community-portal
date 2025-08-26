<x-app-layout>
    <div class="w-full max-w-2xl mx-auto p-6 bg-white shadow-md md:my-4">
    <h2 class="text-xl text-primary font-bold mb-4 underline underline-offset-4">行事予定作成</h2>
    <form action="{{ route('events.store') }}" method="POST">
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
            <input type="date" id="date" name="date" value="{{ old('date') }}" required
                class="w-full max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('date')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">開始時間</label>
            <div class="flex space-x-2">
                <select id="start_hour" name="start_hour"
                    class="w-1/2 max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>-- 時 --</option>
                    @for ($hour = 0; $hour < 24; $hour++)
                        <option value="{{ $hour }}" {{ old('start_hour') === $hour ? 'selected' : '' }}>
                            {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endfor
                </select>
                <select id="start_minute" name="start_minute"
                    class="w-1/2 max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>-- 分 --</option>
                    @for ($minute = 0; $minute < 60; $minute += 5)
                        <option value="{{ $minute }}" {{ old('start_minute') === $minute ? 'selected' : '' }}>
                            {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endfor
                </select>
            </div>
            @error('start_time')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">終了時間</label>
            <div class="flex space-x-2">
                <select id="end_hour" name="end_hour"
                    class="w-1/2 max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>-- 時 --</option>
                    @for ($hour = 0; $hour < 24; $hour++)
                        <option value="{{ $hour }}" {{ old('end_hour') === $hour ? 'selected' : '' }}>
                            {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endfor
                </select>
                <select id="end_minute" name="end_minute"
                    class="w-1/2 max-w-[200px] border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>-- 分 --</option>
                    @for ($minute = 0; $minute < 60; $minute += 5)
                        <option value="{{ $minute }}" {{ old('end_minute') === $minute ? 'selected' : '' }}>
                            {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endfor
                </select>
            </div>
            @error('end_time')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">場所</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('location')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">内容</label>
            <textarea id="content" name="content" rows="5"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
            @error('content')
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
    <a href="/events/admin" class="text-blue-500 underline text-lg">戻る</a>
    </div>
    </div>
</x-app-layout>
