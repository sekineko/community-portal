<x-app-layout>
  <div class="content">
    <!-- お知らせ -->
    <div class="notice w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4">
      <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">入会案内</h2>
      <div class="">
        <!-- 入会案内 -->
        <section class="mb-6 text-gray-700">
          <div class="indent-4">このたびは、{{ config('organization.name', '組織名') }}ご関心をお寄せいただき、ありがとうございます。{{ config('organization.name', '組織名') }}は、地域の皆様が安心して暮らせる環境を築くことを目的として、日々さまざまな活動を行っています。ぜひ一緒に、地域の絆を深め、住みよい町づくりにご協力いただければ幸いです。</div>
        </section>

        <!-- 入会資格 -->
        <section class="mb-6 text-gray-700">
          <h2 class="text-lg font-bold text-gray_dark">入会資格</h2>
          <div><a class="text-accent1 hover:underline hover:underline-offset-2" href="/about#map">{{ config('organization.name', '組織名') }}の対象地域</a>にお住まいの方ならどなたでもご入会いただけます。</div>
          <hr class="mt-2 border-gray-300">
        </section>

        <!-- 会費 -->
        <section class="mb-6 text-gray-700">
          <h2 class="text-lg font-bold text-gray_dark">会費</h2>
          <p class="mt-2">
            <strong>町会費:</strong> 2,000円（1世帯／年）  
            ※町会の運営費や行事の開催費用に使用されます。
          </p>
          <hr class="mt-2 border-gray-300">
        </section>
        
          
        <!-- 加入方法 -->
        <section class="mb-6 text-gray-700">
          <h2 class="text-lg font-bold text-gray_dark">加入方法</h2>
          <p class="mt-2">{{ config('organization.short_name', '略称') }}への加入をご希望の方は、以下の方法でお申し込みください。</p>
          <ul class="list-disc list-inside mt-4">
            <li><strong>メール:</strong> 住所、お名前、電話番号、「町会入会希望」とご記入の上、下記のメールアドレスに送信ください。</li>
            <li><strong>手書きフォーム:</strong> 入会申込書にご記入の上、地域センターまでお持ちください。</li>
          </ul>
          <hr class="mt-2 border-gray-300">
        </section>
      
        <!-- 連絡先 -->
        <section class="text-gray-700">
          <h2 class="text-lg font-bold text-gray_dark">連絡先</h2>
          <ul class="mt-4">
            <li><strong>住所:</strong> 東京都○○区夕やけ三丁目1番1号（地域センター）</li>
            <li><strong>電話番号:</strong> 03-0000-0000（地域センター）</li>
            <li><strong>メール:</strong> <a href="mailto:{{ config('organization.contact_email', 'info@example.com') }}" class="text-primary hover:underline">{{ config('organization.contact_email', 'info@example.com') }}</a></li>
          </ul>
          <hr class="mt-2 border-gray-300">
        </section>
      </div>
    </div>
  </div>
</x-app-layout>
