<div>
    <!-- Field Label -->
    @if ($getLabel())
        <label for="{{ $getId() }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            {{ $getLabel() }}
            @if ($isRequired())
                <span class="text-danger-600">*</span>
            @endif
        </label>
    @endif

    <!-- Radio Group Options -->
    <div @class([
        'grid gap-3',
        match($getColumns()) {
            2 => 'sm:grid-cols-2',
            3 => 'sm:grid-cols-3',
            4 => 'sm:grid-cols-4',
            default => null,
        },
    ])>
        @foreach ($getOptions() as $value => $label)
            <div class="relative" wire:key="{{ $getId() }}-{{ $value }}">
                <label
                    for="{{ $getId() }}-{{ $value }}"
                    wire:click="$set('{{ $getStatePath() }}', '{{ $value }}')"
                    @class([
                        'relative h-full flex cursor-pointer rounded-xl border p-4 shadow-sm hover:border-primary-500',
                        $getBorderColor($value, $isOptionSelected($value)),
                    ])
                >
                    <input
                        type="radio"
                        name="{{ $getId() }}"
                        id="{{ $getId() }}-{{ $value }}"
                        value="{{ $value }}"
                        @checked($isOptionSelected($value))
                        wire:model.defer="{{ $getStatePath() }}"
                        class="sr-only"
                        {{ $isOptionDisabled($value, $label) ? 'disabled' : '' }}
                    />
                    
                    <div class="flex w-full items-center">
                        @if ($icon = $getIcon($value))
                            <div @class([
                                'flex-none flex items-center justify-center p-2',
                                $getIconBackgroundColor($value),
                                $getIconBackgroundRadius(),
                            ])>
                                <x-dynamic-component 
                                    :component="$icon" 
                                    @class([
                                        $getIconSize(),
                                        $getIconColor($value),
                                    ])
                                />
                            </div>
                        @endif

                        <div class="ml-4 flex flex-col">
                            <span class="font-medium text-gray-900 dark:text-gray-100">
                                {{ $label }}
                            </span>

                            @if ($description = $getDescription($value))
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $description }}
                                </span>
                            @endif
                        </div>
                    </div>
                </label>

                @if($isOptionSelected($value))
                    <div class="absolute right-3 top-3 text-primary-600 dark:text-primary-400">
                        <x-heroicon-m-check-circle class="h-5 w-5" />
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>