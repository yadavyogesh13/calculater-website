@php
    $colorClasses = [
        'blue' => 'bg-blue-500 hover:bg-blue-600',
        'green' => 'bg-green-500 hover:bg-green-600',
        'red' => 'bg-red-500 hover:bg-red-600',
        'purple' => 'bg-purple-500 hover:bg-purple-600',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-600',
        'indigo' => 'bg-indigo-500 hover:bg-indigo-600',
    ];
@endphp

<a href="{{ $route }}" class="calculator-card block bg-white rounded-xl shadow-md p-6 border border-gray-200">
    <div class="flex items-start space-x-4">
        <div class="w-12 h-12 {{ $colorClasses[$color] ?? 'bg-blue-500' }} rounded-lg flex items-center justify-center flex-shrink-0">
            <i class="{{ $icon }} text-white text-lg"></i>
        </div>
        <div class="flex-1">
            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $title }}</h4>
            <p class="text-gray-600 text-sm">{{ $description }}</p>
        </div>
        <div class="flex-shrink-0">
            <i class="fas fa-chevron-right text-gray-400"></i>
        </div>
    </div>
</a>