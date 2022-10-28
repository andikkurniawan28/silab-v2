@foreach($imbibitions as $imbibition)
<div class="modal fade" id="delete{{ $imbibition->id }}" tabindex="-1" imbibition="dialog" aria-labelledby="delete{{ $imbibition->id }}Label" aria-hidden="true">
    <div class="modal-dialog" imbibition="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $imbibition->id }}Label">Delete {{ ucfirst('imbibisi') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('imbibitions.destroy', $imbibition->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'text',
                    'value' => $imbibition->id,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes 
                    @include('components.icon', ['icon' => 'trash'])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach