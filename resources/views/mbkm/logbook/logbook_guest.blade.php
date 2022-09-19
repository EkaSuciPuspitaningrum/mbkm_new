<x-guest-layout>

    @if($mhsw_mbkm_exist)
        @include('layouts.logbook_layout')
    @endif

    <x-slot name="script">
        <script>
            let url = "{{ url('/logbook/noreg') }}/{{ $mahasiswa_mbkm_id->id }}";
        </script>
    </x-slot>
</x-guest-layout>
