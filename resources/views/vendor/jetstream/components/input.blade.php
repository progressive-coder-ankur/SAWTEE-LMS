@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700
focus:border-primary
focus:ring-0 focus:ring-primary dark:focus:ring-primary-darker dark:bg-dark dark:focus:border-primary-darker
focus:ring-opacity-50
focus:shadow-md rounded-md shadow-sm']) !!}>
