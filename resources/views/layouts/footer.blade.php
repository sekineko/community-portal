<footer class="bg-primary py-6 text-white text-center">
    <div class="container mx-auto text-sm">
        <p class="text-white">&copy; <?php echo date("Y"); ?> {{ config('organization.name', '組織名') }}. All rights reserved.</p>
        <nav class="mt-4">
        <a href="/privacy" class="hover:underline">プライバシーポリシー</a>
        <span class="mx-2">|</span>
        <a href="/terms" class="hover:underline">利用規約</a>
        <span class="mx-2">|</span>
        <a href="mailto:{{ config('organization.contact_email', 'info@example.com') }}" class="hover:underline">お問い合わせ</a>
        </nav>
    </div>
</footer>