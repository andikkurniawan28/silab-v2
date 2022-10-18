@foreach($users as $user)
<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $user->id }}Label">Delete {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes 
                    @include('components.icon', ['icon' => 'trash'])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach