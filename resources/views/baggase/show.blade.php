@foreach($baggases as $baggase)
<div class="modal fade" id="show{{ $baggase->id }}" tabindex="-1" baggase="dialog" aria-labelledby="show{{ $baggase->id }}Label" aria-hidden="true">
    <div class="modal-dialog" baggase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $baggase->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $baggase->sample_id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Analis',
                    'name' => 'analyst',
                    'type' => 'text',
                    'value' => $baggase->analyst,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Mandor',
                    'name' => 'master',
                    'type' => 'text',
                    'value' => $baggase->master,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $baggase->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $baggase->updated_at,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach