@foreach($mollases as $mollase)
<div class="modal fade" id="edit{{ $mollase->id }}" tabindex="-1" mollase="dialog" aria-labelledby="edit{{ $mollase->id }}Label" aria-hidden="true">
    <div class="modal-dialog" mollase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $mollase->id }}Label">Edit {{ ucfirst('mollase') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('mollases.update', $mollase->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input3',[
                    'label' => 'Volume T1',
                    'name' => 'volume_t1',
                    'type' => 'number',
                    'value' => $mollase->volume_t1,
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Volume T2',
                    'name' => 'volume_t2',
                    'type' => 'number',
                    'value' => $mollase->volume_t2,
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Volume T3',
                    'name' => 'volume_t3',
                    'type' => 'number',
                    'value' => $mollase->volume_t3,
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Meteran',
                    'name' => 'meters',
                    'type' => 'number',
                    'value' => $mollase->meters,
                    'modifier' => '',
                ])

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach