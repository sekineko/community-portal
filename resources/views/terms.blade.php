<x-app-layout>
    <div class="w-full max-w-5xl mx-auto p-6 bg-white md:my-4 text-gray-600 shadow-md">
        <h2 class="border-l-8 border-primary pl-2 text-xl text-primary_dark font-bold mb-4">利用規約</h2>
        <div class="">
            <!-- 利用規約本文 -->
            <section class="mb-6 text-gray-600">
                <div class="indent-4">この利用規約（以下、「本規約」）は、{{ config('organization.name', '組織名') }}（以下、「当会」）が提供するサービスの利用条件を定めるものです。当会のサービスを利用される方（以下、「利用者」）は、本規約に同意したものとみなします。</div>
            </section>

            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">1. サービスの利用</h2>
                <div class="indent-4">利用者は、当会が提供するすべてのサービスを、本規約に従って適切に利用するものとします。</div>
            </section>
            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">2. 禁止事項</h2>
                <div class="indent-4">利用者は、以下の行為を行ってはなりません。</div>
                <ul>
                <li>法令または公序良俗に違反する行為</li>
                <li>当会または第三者の権利を侵害する行為</li>
                <li>不正アクセスやサービスの妨害行為</li>
                <li>虚偽の情報を登録または提供する行為</li>
                </ul>
            </section>
            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">3. 免責事項</h2>
                <div class="indent-4">当会は、以下の場合において一切の責任を負いません。</div>
                <ul>
                <li>サービスの提供が停止または中断した場合</li>
                <li>利用者間、または利用者と第三者との間で生じたトラブル</li>
                <li>利用者がサービスを利用することによって被った損害</li>
                </ul>
            </section>
            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">4. サービス内容の変更・終了</h2>
                <div class="indent-4">当会は、事前の通知なくサービス内容を変更または終了することがあります。これにより生じた損害について一切の責任を負いません。</div>
            </section>
            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">5. 個人情報の取り扱い</h2>
                <div class="indent-4">利用者の個人情報の取り扱いについては、別途定める「プライバシーポリシー」に従うものとします。</div>
            </section>
            <section class="mb-6">
                <h2 class="text-xl font-bold text-gray-700">6. 本規約の変更</h2>
                <div class="indent-4">当会は、必要に応じて本規約を変更することがあります。変更後の規約は、公式ウェブサイトに掲載した時点で効力を生じるものとします。</div>
            </section>
        </div>
    </div>
</x-app-layout>