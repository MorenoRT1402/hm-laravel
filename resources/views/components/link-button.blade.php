<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-block mt-6 mb-6 px-4 rounded-lg transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-1 hover:scale-105 active:scale-95'
]) }}>
    {{ $slot }}
</a>