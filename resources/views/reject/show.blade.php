@foreach($rejects as $reject)
<div class="modal fade" id="show{{ $reject->id }}" tabindex="-1" reject="dialog" aria-labelledby="show{{ $reject->id }}Label" aria-hidden="true">
    <div class="modal-dialog" reject="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $reject->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $reject->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $reject->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $reject->updated_at,
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