@foreach($methods as $method)
<div class="modal fade" id="delete{{ $method->id }}" tabindex="-1" method="dialog" aria-labelledby="delete{{ $method->id }}Label" aria-hidden="true">
    <div class="modal-dialog" method="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $method->id }}Label">Delete {{ ucfirst('method') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('methods.destroy', $method->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $method->name,
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