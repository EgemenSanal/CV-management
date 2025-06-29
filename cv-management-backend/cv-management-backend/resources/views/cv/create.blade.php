<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white leading-tight">
            Yeni CV Oluştur
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto bg-gray-800 text-white p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('cv.store') }}">
                @csrf

                <!-- Basic Inputs -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="firstName" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="lastName" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div class="col-span-2">
                        <label>Summary</label>
                        <textarea name="summary" rows="3" class="w-full mt-1 p-2 rounded text-black"></textarea>
                    </div>
                </div>

                <!-- Dynamic Sections -->
                @foreach (['experiences' => 'Experience', 'educations' => 'Education', 'skills' => 'Skill'] as $section => $label)
                    <div class="mt-6">
                        <label class="font-semibold text-lg">{{ $label }}s</label>
                        <div id="{{ $section }}-wrapper" class="space-y-2 mt-2"></div>
                        <button type="button" onclick="addField('{{ $section }}')" class="mt-2 bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
                            + Add {{ $label }}
                        </button>
                    </div>
                @endforeach

                <!-- Submit -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 px-4 py-3 rounded text-white font-bold">
                        Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addField(section) {
            const wrapper = document.getElementById(`${section}-wrapper`);
            const input = document.createElement('input');
            input.type = 'text';
            input.name = section + '[]';
            input.required = true;
            input.className = 'w-full p-2 rounded text-black';
            wrapper.appendChild(input);
        }
    </script>
</x-app-layout>
