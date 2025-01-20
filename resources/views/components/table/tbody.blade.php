<tbody {{ $attributes->merge(['class' => 'divide-y divide-gray-200 '.$color.' dark:bg-gray-800 dark:divide-gray-700']) }} >
{{ $slot }}
</tbody>
