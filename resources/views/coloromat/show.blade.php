@foreach($coloromats as $coloromat)
<div class="modal fade" id="show{{ $coloromat->id }}" tabindex="-1" coloromat="dialog" aria-labelledby="show{{ $coloromat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" coloromat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $coloromat->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $coloromat->sample_id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Analis',
                    'name' => 'analyst',
                    'type' => 'text',
                    'value' => $coloromat->analyst,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Preparasi',
                    'name' => 'preparation',
                    'type' => 'text',
                    'value' => $coloromat->preparation,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Mandor',
                    'name' => 'master',
                    'type' => 'text',
                    'value' => $coloromat->master,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $coloromat->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $coloromat->updated_at,
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