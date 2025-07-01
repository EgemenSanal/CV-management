<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white leading-tight">
            Create New CV
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto bg-gray-800 text-white p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('cv.store') }}" onsubmit="return prepareJsonFields()">
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
                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="phoneNumber" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div>
                        <label>City</label>
                        <input type="text" name="cityLiving" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div>
                        <label>Country</label>
                        <input type="text" name="countryLiving" required class="w-full mt-1 p-2 rounded text-black">
                    </div>
                    <div class="col-span-2">
                        <label>Summary</label>
                        <textarea name="summary" rows="3" class="w-full mt-1 p-2 rounded text-black"></textarea>
                    </div>
                </div>

                <!-- Dynamic Sections -->
                @foreach (['experiences' => 'Experience', 'educations' => 'Education'] as $section => $label)
                    <div class="mt-6">
                        <label class="font-semibold text-lg">{{ $label }}s</label>
                        <div id="{{ $section }}-wrapper" class="space-y-4 mt-2"></div>
                        <button type="button" onclick="addComplexField('{{ $section }}')" class="mt-2 bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
                            + Add {{ $label }}
                        </button>
                    </div>
                @endforeach

                <!-- Skills -->
                <div class="mt-6">
                    <label class="font-semibold text-lg">Skills</label>
                    <div id="skills-wrapper" class="space-y-2 mt-2"></div>
                    <button type="button" onclick="addSkillField()" class="mt-2 bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
                        + Add Skill
                    </button>
                </div>

                <!-- Hidden Inputs -->
                <input type="hidden" name="experiences" id="experiencesInput">
                <input type="hidden" name="educations" id="educationsInput">
                <input type="hidden" name="skills" id="skillsInput">

                <!-- Submit -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 px-4 py-3 rounded text-white font-bold">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function createInput(name, placeholder) {
            const input = document.createElement('input');
            input.type = 'text';
            input.name = name;
            input.placeholder = placeholder;
            input.required = true;
            input.className = 'w-full p-2 rounded text-black';
            return input;
        }

        function addComplexField(section) {
            const wrapper = document.getElementById(`${section}-wrapper`);
            const container = document.createElement('div');
            container.className = 'grid md:grid-cols-2 gap-4';

            if (section === 'experiences') {
                container.appendChild(createInput('experiences[][title]', 'Job Title / Role'));
                container.appendChild(createInput('experiences[][company]', 'Company'));
                container.appendChild(createInput('experiences[][start]', 'Start Date'));
                container.appendChild(createInput('experiences[][end]', 'End Date'));
                container.appendChild(createInput('experiences[][city]', 'City'));
                container.appendChild(createInput('experiences[][country]', 'Country'));
            }

            if (section === 'educations') {
                container.appendChild(createInput('educations[][degree]', 'Degree'));
                container.appendChild(createInput('educations[][institution]', 'Institution'));
                container.appendChild(createInput('educations[][start]', 'Start Date'));
                container.appendChild(createInput('educations[][end]', 'End Date'));
                container.appendChild(createInput('educations[][city]', 'City'));
                container.appendChild(createInput('educations[][country]', 'Country'));
            }

            wrapper.appendChild(container);
        }

        function addSkillField() {
            const wrapper = document.getElementById(`skills-wrapper`);
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'skills[]';
            input.required = true;
            input.className = 'w-full p-2 rounded text-black';
            input.placeholder = 'Skill (e.g., Laravel, React)';
            wrapper.appendChild(input);
        }

        function prepareJsonFields() {
            const experienceInputs = document.querySelectorAll('input[name^="experiences"]');
            const educationInputs = document.querySelectorAll('input[name^="educations"]');
            const skillsInputs = document.querySelectorAll('input[name="skills[]"]');

            const experienceList = [];
            const educationList = [];
            const skillList = [];

            for (let i = 0; i < experienceInputs.length; i += 6) {
                experienceList.push({
                    title: experienceInputs[i]?.value,
                    company: experienceInputs[i + 1]?.value,
                    start: experienceInputs[i + 2]?.value,
                    end: experienceInputs[i + 3]?.value,
                    city: experienceInputs[i + 4]?.value,
                    country: experienceInputs[i + 5]?.value,
                });
            }

            for (let i = 0; i < educationInputs.length; i += 6) {
                educationList.push({
                    degree: educationInputs[i]?.value,
                    institution: educationInputs[i + 1]?.value,
                    start: educationInputs[i + 2]?.value,
                    end: educationInputs[i + 3]?.value,
                    city: educationInputs[i + 4]?.value,
                    country: educationInputs[i + 5]?.value,
                });
            }

            skillsInputs.forEach((input) => {
                if (input.value) {
                    skillList.push(input.value);
                }
            });

            document.getElementById('experiencesInput').value = JSON.stringify(experienceList);
            document.getElementById('educationsInput').value = JSON.stringify(educationList);
            document.getElementById('skillsInput').value = JSON.stringify(skillList);

            return true;
        }
    </script>
</x-app-layout>
