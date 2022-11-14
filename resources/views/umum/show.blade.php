@foreach($umums as $umum)
<div class="modal fade" id="show{{ $umum->id }}" tabindex="-1" umum="dialog" aria-labelledby="show{{ $umum->id }}Label" aria-hidden="true">
    <div class="modal-dialog" umum="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $umum->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $umum->sample_id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Analis',
                    'name' => 'analyst',
                    'type' => 'text',
                    'value' => $umum->analyst,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Mandor',
                    'name' => 'master',
                    'type' => 'text',
                    'value' => $umum->master,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $umum->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $umum->updated_at,
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