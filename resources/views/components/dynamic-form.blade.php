@props([
    'fields' => [],
    'values' => [],
    'onSave' => 'submit',
    'successMessage' => "We've received your message, we'll get back to you.",
    'mostFieldsRequired' => true,
])

@php
    $initialData = [];
    foreach ($fields as $field) {
        $initialData[$field['name']] = $values[$field['label']] ?? '';
    }
@endphp

<div x-data="{
    formData: {{ json_encode($initialData) }},
    submitted: false,
    loading: false,
    error: null,
    async handleSubmit() {
        this.loading = true;
        this.error = null;
        try {
            const result = await {{ $onSave }}(this.formData, this.$el);
            if (result && !result.ok) {
                this.error = 'Something went wrong. Please try again.';
            } else {
                this.submitted = true;
            }
        } catch (e) {
            this.error = 'Something went wrong. Please try again.';
        }
        this.loading = false;
    }
}">
    <div x-cloak x-show="submitted" class="py-8 text-center">
        <p class="text-lg font-medium text-primary">{{ $successMessage }}</p>
    </div>

    <form x-show="!submitted" @submit.prevent="handleSubmit" class="grid grid-cols-2 gap-x-4 gap-y-5">
        @foreach($fields as $field)
            @php
                $isRequired = isset($field['required']) ? $field['required'] : $mostFieldsRequired;
                $isHalf = ($field['width'] ?? 'full') === 'half';
                $type = $field['type'] ?? 'text';
                $choices = $field['meta']['choices'] ?? [];
                $inputClass = 'df-input w-full border border-stroke rounded-lg px-3 py-2 bg-canvas text-content focus:outline-none focus:ring-2 focus:ring-primary/30 text-sm';
            @endphp
            <div class="{{ $isHalf ? 'col-span-2 md:col-span-1' : 'col-span-2' }}">
                <label class="block text-sm font-medium mb-1.5">
                    {{ $field['label'] }}
                    @if($isRequired)<span class="text-red-500 ml-0.5">*</span>@endif
                </label>

                @if($type === 'select')
                    <select
                        name="{{ $field['name'] }}"
                        x-model="formData['{{ $field['name'] }}']"
                        @if($isRequired) required @endif
                        class="{{ $inputClass }}">
                        <option value="">Select...</option>
                        @foreach($choices as $choice)
                            <option value="{{ $choice }}">{{ $choice }}</option>
                        @endforeach
                    </select>
                @elseif($type === 'radio')
                    <div class="flex flex-wrap gap-x-6 gap-y-2 mt-1">
                        @foreach($choices as $choice)
                            <label class="flex items-center gap-2 cursor-pointer text-sm">
                                <input
                                    type="radio"
                                    name="{{ $field['name'] }}"
                                    value="{{ $choice }}"
                                    x-model="formData['{{ $field['name'] }}']"
                                    @if($isRequired) required @endif
                                    class="text-primary">
                                {{ $choice }}
                            </label>
                        @endforeach
                    </div>
                @elseif($type === 'long text')
                    <textarea
                        name="{{ $field['name'] }}"
                        x-model="formData['{{ $field['name'] }}']"
                        placeholder="{{ $field['placeholder'] ?? '' }}"
                        @if($isRequired) required @endif
                        rows="4"
                        class="{{ $inputClass }}"></textarea>
                @else
                    <input
                        type="{{ $type }}"
                        name="{{ $field['name'] }}"
                        x-model="formData['{{ $field['name'] }}']"
                        placeholder="{{ $field['placeholder'] ?? '' }}"
                        @if($isRequired) required @endif
                        class="{{ $inputClass }}">
                @endif
            </div>
        @endforeach

        <div class="col-span-2 pt-2">
            <div x-cloak x-show="error" x-text="error" class="mb-3 text-sm text-red-500"></div>
            <button type="submit" :disabled="loading" class="btn">
                <span x-show="!loading">Submit</span>
                <span x-cloak x-show="loading">Submitting...</span>
            </button>
        </div>
    </form>
</div>
