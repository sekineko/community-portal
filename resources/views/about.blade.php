<x-app-layout>
  <div class="content">
    <!-- お知らせ -->
    <div class="notice w-full max-w-5xl mx-auto p-6 bg-white shadow-md md:my-4">
      <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">{{ config('organization.short_name', '略称') }}について</h2>
      <div class="">
        <!-- 町内会の名称 -->
        <section class="mb-6 text-gray-600">
          <div>「夕やけが美しい街でありたい」という願いを込めて「夕やけ三丁目サンプル町会」と名付けました。</div>
        </section>
      
        <!-- 目的 -->
        <section class="mb-6">
          <h2 class="text-lg font-bold text-gray_dark">概要</h2>
          <div class="mt-2 text-gray-600">
            <p class="indent-4">夕やけ三丁目には、複数の町会がありますが、私たちの町会「夕やけ三丁目サンプル町会」は、地域の中心部に位置し、商店街と住宅地が調和した活気ある地域です。町会としては中規模の地域で、住宅地域にはマンション・アパート・戸建てが混在し、現在約500世帯を数えます。</p>
            <p class="indent-4">この地域は交通のアクセスが良く、最寄り駅まで徒歩10分程度の場所です。近くには小学校・保育園・地域センターがあり、子育てには良い環境です。夕やけ三丁目サンプル町会では、町会員による定期的な町内パトロール活動や清掃活動を行っています。安全・安心・清潔で住みよい街を会員とともに作ってまいります。</p>
            <p class="indent-4">この町会は地域住民の絆を大切にし、季節ごとの行事や防災活動を通じて、世代を超えた交流を促進しています。伝統を大切にしながらも、新しい住民の方々も温かく迎え入れ、みんなで支え合う地域づくりを目指しています。どうぞ町会への入会をお待ちしております。</p>  
          </div>
          <hr class="mt-2 border-gray-300">
        </section>
        <!-- 地図 -->
        <section class="mb-6" id="map">
          <h2 class="text-lg font-bold text-gray_dark">対象地域</h2>
          <img src="{{ asset('images/map.png') }}" alt="Map" class="w-full mt-2">
          <hr class="mt-2 border-gray-300">
        </section>
        <!-- 会員構成 -->
        <section class="mb-6">
          <h2 class="text-lg font-bold text-gray_dark">規模と範囲</h2>
          <ul class="mt-2 text-gray-600">
            <li><strong>会員数:</strong> 約500世帯</li>
            <li><strong>対象地域:</strong> 夕やけ三丁目1~5番地</li>
            <li><strong>入会資格:</strong> 対象地域に居住するすべての住民</li>
          </ul>
          <hr class="mt-2 border-gray-300">
        </section>
      
        <!-- 主な活動内容 -->
        <section class="mb-6">
          <h2 class="text-lg font-bold text-gray_dark">主な活動内容</h2>
          <ul class="list-disc list-inside mt-2 text-gray-600">
            <li><strong>避難訓練:</strong> 防災意識を高めるための避難訓練を実施します。</li>
            <li><strong>備蓄食品・防災用品管理:</strong> 災害時に備えて備蓄食品や防災用品の管理を行います。</li>
            <li><strong>清掃活動:</strong> 毎月第二土曜日（9:00~10:00）、町内の清掃活動を行い、地域の美化に努めています。</li>
            <li><strong>防犯・街灯管理:</strong> 防犯カメラや街灯の管理を行い、安全な街づくりに取り組みます。</li>            
            <li><strong>夏祭り:</strong> 毎年8月に地域住民の交流を目的とした夏祭りを開催します。</li>
            <li><strong>秋祭り:</strong> 毎年10月に行われ、地域全体が一体となって楽しむお祭りです。</li>
            <li><strong>スポーツ大会:</strong> 地域のスポーツ大会に参加し、住民同士の親睦を深めます。</li>
            <li><strong>情報共有:</strong> 回覧板・掲示板を通じて地域に関する重要な情報を共有します。</li>
            <li><strong>年末パトロール:</strong> 年末に防犯・防火を目的として、町内を巡回します。</li>
          </ul>
          <hr class="mt-2 border-gray-300">
        </section>
        <!-- 役員 -->
        <section class="mb-6">
          <h2 class="text-lg font-bold text-gray_dark">役員</h2>
          <div class="mt-4 md:mb-8 md:mx-8">
            <div><a href="{{ route('documents.index') }}" class="text-accent1 hover:underline">公開資料</a>の役員名簿をご覧ください。</div>
          </div>
          <hr class="mt-2 border-gray-300">
        </section>      
        <!-- LINE -->
        <section>
          <h2 class="text-lg font-bold text-gray_dark">サンプル町会LINE公式アカウント</h2>
          <div class="mt-4 md:mb-8 md:mx-8">
            <div>最新のお知らせや活動報告などをお届けします。ぜひご登録をお願いします。</div>
            <img src="{{ asset('images/line_qr.png') }}" alt="QRコード" class="mt-2">
          </div>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>
