@foreach($rafactions as $rafaction)
<div class="modal fade" id="edit{{ $rafaction->id }}" tabindex="-1" rafaction="dialog" aria-labelledby="edit{{ $rafaction->id }}Label" aria-hidden="true">
    <div class="modal-dialog" rafaction="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $rafaction->id }}Label">Edit {{ ucfirst('Scoring MBS') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('rafactions.update', $rafaction->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Antrian',
                    'name' => 'barcode',
                    'type' => 'text',
                    'value' => $rafaction->barcode,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Score',
                    'name' => 'score',
                    'type' => 'text',
                    'value' => $rafaction->score,
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