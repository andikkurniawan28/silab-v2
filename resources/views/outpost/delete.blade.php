@foreach($outposts as $outpost)
<div class="modal fade" id="delete{{ $outpost->id }}" tabindex="-1" outpost="dialog" aria-labelledby="delete{{ $outpost->id }}Label" aria-hidden="true">
    <div class="modal-dialog" outpost="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $outpost->id }}Label">Delete {{ ucfirst('Pos Pantau') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('outposts.destroy', $outpost->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $outpost->name,
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