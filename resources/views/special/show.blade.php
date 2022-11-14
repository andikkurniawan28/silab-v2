@foreach($specials as $special)
<div class="modal fade" id="show{{ $special->id }}" tabindex="-1" special="dialog" aria-labelledby="show{{ $special->id }}Label" aria-hidden="true">
    <div class="modal-dialog" special="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $special->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $special->sample_id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'PI',
                    'name' => 'preparation_index',
                    'type' => 'number',
                    'value' => $special->preparation_index,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Fiber',
                    'name' => 'fiber',
                    'type' => 'number',
                    'value' => $special->fiber,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Calcium',
                    'name' => 'calcium',
                    'type' => 'number',
                    'value' => $special->calcium,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'OD',
                    'name' => 'optical_density',
                    'type' => 'number',
                    'value' => $special->optical_density,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Reducted',
                    'name' => 'sugar_reducted',
                    'type' => 'number',
                    'value' => $special->sugar_reducted,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Analis',
                    'name' => 'analyst',
                    'type' => 'text',
                    'value' => $special->analyst,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Mandor',
                    'name' => 'master',
                    'type' => 'text',
                    'value' => $special->master,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $special->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $special->updated_at,
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