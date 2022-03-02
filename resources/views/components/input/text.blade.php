<div class="mb-2">
    <label for="{{ $name }}" class="text-gray-700">
        {{ $label }}
        @if($isRequired())<span class="text-red-500 required-dot">*</span>@endif
    </label>
    <input type="text" name="{{ $name }}" value="{{ old($name) }}" @if($isRequired()) required @endif
        @class([
            'rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent',
            'ring-2 ring-red-500' => $errors->has($name),
        ])
    >
    @error($name)
    <p class="text-sm text-red-500">{{ $errors->first($name) }}</p>
    @enderror
</div>
