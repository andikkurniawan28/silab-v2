@foreach($rafactions as $rafaction)
<div class="modal fade" id="show{{ $rafaction->id }}" tabindex="-1" rafaction="dialog" aria-labelledby="show{{ $rafaction->id }}Label" aria-hidden="true">
    <div class="modal-dialog" rafaction="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $rafaction->id }}Label">Edit {{ ucfirst('Scoring MBS') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Antrian',
                    'name' => 'barcode',
                    'type' => 'text',
                    'value' => $rafaction->barcode,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Register',
                    'name' => 'register',
                    'type' => 'text',
                    'value' => $rafaction->register,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Armada',
                    'name' => 'vehicle',
                    'type' => 'text',
                    'value' => $rafaction->vehicle,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'KUD',
                    'name' => 'cooperative',
                    'type' => 'text',
                    'value' => $rafaction->cooperative,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Pos',
                    'name' => 'outpost',
                    'type' => 'text',
                    'value' => $rafaction->outpost,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Asal',
                    'name' => 'program',
                    'type' => 'text',
                    'value' => $rafaction->program,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Nopol',
                    'name' => 'truck_number',
                    'type' => 'text',
                    'value' => $rafaction->truck_number,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Petani',
                    'name' => 'farmer',
                    'type' => 'text',
                    'value' => $rafaction->farmer,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Time',
                    'name' => 'farmer',
                    'type' => 'text',
                    'value' => $rafaction->created_at,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                {{-- <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'show'])
                </button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach