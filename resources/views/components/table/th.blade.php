<th scope="col" {{ $attributes->merge(['class' => 'p-4 text-xs font-medium text-left text-'.$color.'-500 uppercase dark:text-'.$color.'-400']) }} >
    {{ $slot }}
</th>
