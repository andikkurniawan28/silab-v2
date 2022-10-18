@foreach($coloromats as $coloromat)
<div class="modal fade" id="edit{{ $coloromat->id }}" tabindex="-1" coloromat="dialog" aria-labelledby="edit{{ $coloromat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" coloromat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $coloromat->id }}Label">Edit {{ ucfirst('coloromat') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('coloromats.update', $coloromat->id) }}" class="text-dark">
                @csrf
                @method('PUT')
                
                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $coloromat->material_name,
                    'modifier' => 'readonly',
                ])
                
                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $coloromat->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Icumsa',
                    'name' => 'icumsa',
                    'type' => 'number',
                    'value' => $coloromat->icumsa,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="icumsa_origin" value="{{ $coloromat->icumsa }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach