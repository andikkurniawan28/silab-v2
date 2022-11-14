@foreach($saccharomats as $saccharomat)
<div class="modal fade" id="show{{ $saccharomat->id }}" tabindex="-1" saccharomat="dialog" aria-labelledby="show{{ $saccharomat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" saccharomat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $saccharomat->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $saccharomat->sample_id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Rend',
                    'name' => 'yield',
                    'type' => 'number',
                    'value' => $saccharomat->yield,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Analis',
                    'name' => 'analyst',
                    'type' => 'text',
                    'value' => $saccharomat->analyst,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Prep 1',
                    'name' => 'preparation1',
                    'type' => 'text',
                    'value' => $saccharomat->preparation1,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Prep 2',
                    'name' => 'preparation2',
                    'type' => 'text',
                    'value' => $saccharomat->preparation2,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Mandor',
                    'name' => 'master',
                    'type' => 'text',
                    'value' => $saccharomat->master,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $saccharomat->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $saccharomat->updated_at,
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