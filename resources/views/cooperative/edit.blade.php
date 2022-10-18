@foreach($cooperatives as $cooperative)
<div class="modal fade" id="edit{{ $cooperative->id }}" tabindex="-1" cooperative="dialog" aria-labelledby="edit{{ $cooperative->id }}Label" aria-hidden="true">
    <div class="modal-dialog" cooperative="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $cooperative->id }}Label">Edit {{ ucfirst('cooperative') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('cooperatives.update', $cooperative->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Code',
                    'name' => 'code',
                    'type' => 'text',
                    'value' => $cooperative->code,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $cooperative->name,
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