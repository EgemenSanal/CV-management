<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('CV Yönetim Paneli') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Message -->
            <div class="bg-gray-800 p-6 rounded-xl shadow-lg text-white">
                <h3 class="text-xl font-bold mb-2">Hoş geldin, {{ Auth::user()->name }}!</h3>
                <p>CV’lerini yönetebilir veya yeni bir tane oluşturabilirsin.</p>
            </div>

            <!-- Create New CV Button -->
            <div>
                <a href="{{ route('cv.create') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    + Yeni CV Oluştur
                </a>
            </div>

            <!-- Existing CVs -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($cvs as $cv)
                    <div class="bg-gray-800 p-5 rounded-xl shadow-md text-white flex flex-col justify-between">
                        <div>
                            <h4 class="text-lg font-bold mb-1">{{ $cv->firstName }} {{ $cv->lastName }}</h4>
                            <p class="text-sm text-gray-300 mb-2">{{ $cv->email }}</p>
                            <p class="text-sm">{{ Str::limit($cv->summary, 100) }}</p>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('cv.show', $cv->id) }}"
                               class="text-indigo-400 hover:underline text-sm">Detayları Gör</a>
                            <a href="{{ route('cv.download', $cv->id) }}"
                               class="text-green-400 hover:underline text-sm">PDF olarak indir</a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-300">Henüz CV oluşturmadınız.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
