@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-500  focus:border-rose-500 focus:ring-rose-500  rounded-md shadow-sm']) }}>
