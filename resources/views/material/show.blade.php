@foreach($materials as $material)
<div class="modal fade" id="show{{ $material->id }}" tabindex="-1" material="dialog" aria-labelledby="show{{ $material->id }}Label" aria-hidden="true">
    <div class="modal-dialog" material="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $material->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Station',
                    'name' => 'station_name',
                    'type' => 'text',
                    'value' => $material->station_name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Method',
                    'name' => 'method_name',
                    'type' => 'text',
                    'value' => $material->method_name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $material->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $material->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $material->updated_at,
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