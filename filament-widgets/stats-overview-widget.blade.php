@php
    $columns = $this->getColumns();
@endphp

<x-filament-widgets::widget class="fi-wi-stats-overview">
    <div
            @if ($pollingInterval = $this->getPollingInterval())
                wire:poll.{{ $pollingInterval }}
            @endif
            @class([
                'fi-wi-stats-overview-stats-ctn grid gap-6',
                'md:grid-cols-1' => $columns === 1,
                'md:grid-cols-2' => $columns === 2,
                'md:grid-cols-3' => $columns === 3,
                'md:grid-cols-4' => $columns === 4,
                'md:grid-cols-5' => $columns === 5,
                'md:grid-cols-6' => $columns === 6,
                'md:grid-cols-7' => $columns === 7,
                'md:grid-cols-8' => $columns === 8,
                'md:grid-cols-9' => $columns === 9,
                'md:grid-cols-10' => $columns === 10,
                'md:grid-cols-11' => $columns === 11,
                'md:grid-cols-12' => $columns === 12,
                'md:grid-cols-2 xl:grid-cols-4' => $columns === 4,
            ])
    >
        @foreach ($this->getCachedStats() as $stat)
            {{ $stat }}
        @endforeach
    </div>
</x-filament-widgets::widget>
