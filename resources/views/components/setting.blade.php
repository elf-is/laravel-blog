@props(['heading'])

<section class="container py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex flex-row flex-wrap py-4">
        <main class="flex-1">
            <x-box>
                {{ $slot }}
            </x-box>
        </main>
    </div>
</section>