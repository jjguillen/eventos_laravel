<tr scope="col" {{ $attributes->merge(['class' => 'hover:bg-'.$color.'gray-100 dark:hover:bg-'.$color.'gray-700']) }} >
    {{ $slot }}
</tr>
