@php
    $isContained = $isContained();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
            {{
                $attributes
                    ->merge([
                        'id' => $getId(),
                    ], escape: false)
                    ->merge($getExtraAttributes(), escape: false)
                    ->class([
                        'fi-in-repeatable',
                        'fi-contained' => $isContained,
                    ])
            }}
    >
        @if (count($childComponentContainers = $getChildComponentContainers()))
            <ul>
                <x-filament::grid
                        :default="$getGridColumns('default')"
                        :sm="$getGridColumns('sm')"
                        :md="$getGridColumns('md')"
                        :lg="$getGridColumns('lg')"
                        :xl="$getGridColumns('xl')"
                        :two-xl="$getGridColumns('2xl')"
                        class="gap-4"
                >
                    @foreach ($childComponentContainers as $container)

                        <li
                                @class([
                                    'fi-in-repeatable-item block',
                                    'border-b border-blue-200 pb-4' => ! $loop->last,
                                    'fi-fieldset rounded-xl border border-blue-200 p-6 dark:border-white/10' => $isContained,
                                ])
                        >
                            {{ $container }}
                        </li>
                    @endforeach
                </x-filament::grid>
            </ul>
        @elseif (($placeholder = $getPlaceholder()) !== null)
            <x-filament-infolists::entries.placeholder>
                {{ $placeholder }}
            </x-filament-infolists::entries.placeholder>
        @endif
    </div>
</x-dynamic-component>
