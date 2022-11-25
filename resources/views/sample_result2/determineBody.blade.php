@switch($method_id)
    @case(1)
        @include('sample_result2.coloromat')
        {{-- @include('sample_result2.moisture')
        @include('sample_result2.saccharomat')
        @include('sample_result2.sugar') --}}
        @break
    @default
        @break
@endswitch
