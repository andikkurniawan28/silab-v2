@foreach($dirts as $dirt)
<div class="modal fade" id="edit{{ $dirt->id }}" tabindex="-1" dirt="dialog" aria-labelledby="edit{{ $dirt->id }}Label" aria-hidden="true">
    <div class="modal-dialog" dirt="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $dirt->id }}Label">Edit {{ ucfirst('kotoran') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('dirts.update', $dirt->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $dirt->name,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Max',
                    'name' => 'max',
                    'type' => 'number',
                    'value' => $dirt->max,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Interval',
                    'name' => 'interval',
                    'type' => 'number',
                    'value' => $dirt->interval,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Punish',
                    'name' => 'punishment',
                    'type' => 'number',
                    'value' => $dirt->punishment,
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
