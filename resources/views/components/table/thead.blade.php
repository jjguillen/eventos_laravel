<thead {{ $attributes->merge(['class' => 'bg-'.$color.'-500 dark:bg-'.$color.'-700']) }} >
    <tr>
        {{ $slot }}
    </tr>
</thead>
