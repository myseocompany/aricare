<x-mail::message>
    <x-slot:header>
        <svg
            class="h-8"
            id="logo_svg_aricare_contornos" 
            data-name="logo_aricare" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 109.68 16.52"><defs><style>.cls-1{fill:#3e3ef4;}.cls-2{fill:#88949e;}</style></defs><path class="cls-1" d="M6,20H2.85L8.55,5.57A3.2,3.2,0,0,1,12,3.48a3.16,3.16,0,0,1,3.37,2.09L20.81,20H17.66L12.73,6.94a.77.77,0,0,0-.79-.55.82.82,0,0,0-.82.55Z" transform="translate(-2.85 -3.48)"/><path class="cls-1" d="M32,3.77c3.66,0,5.22,2.26,5.22,4.86a4.78,4.78,0,0,1-3.44,4.88L37.52,20H34.37l-3.71-6.28H26.43a.36.36,0,0,0-.41.41V20H23.19V13.58c0-1.83.77-2.57,2.54-2.57h6.33a2.1,2.1,0,0,0,2.26-2.26,2,2,0,0,0-2.26-2.14h-8.9V3.77Z" transform="translate(-2.85 -3.48)"/><path class="cls-1" d="M43.21,3.77V20H40.38V3.77Z" transform="translate(-2.85 -3.48)"/><path class="cls-2" d="M60.14,3.77V6.61H53.86c-3.12,0-4.49,1.56-4.49,5.29s1.34,5.26,4.49,5.26h6.28V20H53.86c-4.73,0-7.33-2.67-7.33-8.1s2.62-8.13,7.33-8.13Z" transform="translate(-2.85 -3.48)"/><path class="cls-2" d="M65.14,20H62l5.7-14.43a3.22,3.22,0,0,1,3.42-2.09,3.14,3.14,0,0,1,3.36,2.09L80,20H76.83L71.9,6.94a.78.78,0,0,0-.8-.55.81.81,0,0,0-.81.55Z" transform="translate(-2.85 -3.48)"/><path class="cls-2" d="M91.13,3.77c3.65,0,5.22,2.26,5.22,4.86a4.78,4.78,0,0,1-3.44,4.88L96.68,20H93.53l-3.7-6.28H85.6a.36.36,0,0,0-.41.41V20H82.35V13.58c0-1.83.77-2.57,2.55-2.57h6.33a2.1,2.1,0,0,0,2.26-2.26,2,2,0,0,0-2.26-2.14h-8.9V3.77Z" transform="translate(-2.85 -3.48)"/><path class="cls-2" d="M112.5,3.77V6.61h-8.12c-1.71,0-2.46.79-2.46,2s.84,1.92,2.48,1.92h8v2.58h-8c-1.64,0-2.48.65-2.48,2s.79,2,2.45,2h8.23V20H104.3c-3.84,0-5.41-1.9-5.41-4.42a3.71,3.71,0,0,1,2.34-3.73,3.63,3.63,0,0,1-2.29-3.66c0-2.59,1.61-4.42,5.44-4.42Z" transform="translate(-2.85 -3.48)"/>
        </svg>
    </x-slot:header>
    {{-- Greeting --}}
    
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards,')<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n into your web browser:",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
