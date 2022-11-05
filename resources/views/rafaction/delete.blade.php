@foreach($rafactions as $rafaction)
<div class="modal fade" id="delete{{ $rafaction->id }}" tabindex="-1" rafaction="dialog" aria-labelledby="delete{{ $rafaction->id }}Label" aria-hidden="true">
    <div class="modal-dialog" rafaction="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $rafaction->id }}Label">Delete {{ ucfirst('Scoring MBS') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('rafactions.destroy', $rafaction->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                {{-- @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $rafaction->name,
                    'modifier' => 'readonly',
                ]) --}}

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