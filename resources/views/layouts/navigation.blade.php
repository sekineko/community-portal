<div class="text-center bg-primary flex p-4 justify-center flex-wrap">
    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="{{ config('organization.name', '組織名') }} Logo" class="w-9 md:w-12 h-auto mx-2 md:mx-4"></a>
    <a href="/"><h1 class="font-mplus wf-mplus1p text-2xl md:text-4xl font-bold text-white">{{ config('organization.name', '組織名') }}</h1></a>
</div>
<nav x-data="{ open: false }" class="bg-secondary_light border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 px-4">
            <!-- Navigation Links -->
            <div class="flex justify-center flex-1">
                <div class="hidden space-x-8 sm:-my-px sm:ms-2 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        HOME
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ config('organization.short_name', '略称') }}について
                    </x-nav-link>
                    <x-nav-link :href="route('join')" :active="request()->routeIs('join')">
                        入会案内
                    </x-nav-link>
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                        行事予定
                    </x-nav-link>
                    <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                        活動報告
                    </x-nav-link>
                    <x-nav-link :href="route('documents.index')" :active="request()->routeIs('documents.index')">
                        公開資料
                    </x-nav-link>
                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        管理
                    </x-nav-link>
                    @endauth
                </div>
            </div>
        
            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button 
                    @click="open = ! open" 
                    class="inline-flex items-center justify-center p-2 text-primary focus:outline-none focus:text-highlight transition duration-150 ease-in-out">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <!-- メニュー閉じるアイコン -->
                        <path 
                            :class="{'hidden': open, 'inline-flex': ! open }" 
                            class="inline-flex" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16" />
                        <!-- メニュー開くアイコン -->
                        <path 
                            :class="{'hidden': ! open, 'inline-flex': open }" 
                            class="hidden" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                HOME
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ config('organization.short_name', '略称') }}について
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('join')" :active="request()->routeIs('join')">
                入会案内
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                行事予定
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                活動報告
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('documents.index')" :active="request()->routeIs('documents.index')">
                公開資料
            </x-responsive-nav-link>
            @auth
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                管理
            </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
