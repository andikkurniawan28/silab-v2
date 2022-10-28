@foreach($balances as $balance)
<div class="modal fade" id="edit{{ $balance->id }}" tabindex="-1" balance="dialog" aria-labelledby="edit{{ $balance->id }}Label" aria-hidden="true">
    <div class="modal-dialog" balance="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $balance->id }}Label">Edit {{ ucfirst('Flow Nira Mentah') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('balances.update', $balance->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Tebu',
                    'name' => 'sugar_cane',
                    'type' => 'text',
                    'value' => $balance->sugar_cane,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Totalizer',
                    'name' => 'totalizer_raw_juice',
                    'type' => 'number',
                    'value' => $balance->totalizer_raw_juice,
                    'modifier' => 'required',
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