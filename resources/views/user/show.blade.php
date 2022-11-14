@foreach($users as $user)
<div class="modal fade" id="show{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="show{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $user->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $user->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Corrector',
                    'name' => 'corrector',
                    'type' => 'text',
                    'value' => $user->corrector,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $user->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $user->updated_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Status',
                    'name' => 'is_active',
                    'type' => 'text',
                    'value' => $user->is_active,
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