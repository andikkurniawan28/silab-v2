<div class="modal fade" id="create{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="create{{ $material->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Create Ronsel {{ $material->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('ronsel_masakan') }}" class="text-dark" target="_blank">
                @csrf
                @method('POST')
                    
                    <input type="hidden" name="material_id" value="{{ $material->id }}">

                    @include('components.input4',[
                        'label' => 'Pan',
                        'name' => 'pan',
                        'type' => 'number',
                        'value' => '',
                        'max' => 18,
                        'modifier' => 'required',
                    ])

                    @include('components.input4',[
                        'label' => 'Palung',
                        'name' => 'reef',
                        'type' => 'number',
                        'value' => '',
                        'max' => 10,
                        'modifier' => 'required',
                    ])

                    @include('components.input4',[
                        'label' => 'Volume (HL)',
                        'name' => 'volume',
                        'type' => 'number',
                        'value' => '',
                        'max' => 1000,
                        'modifier' => 'required',
                    ])

                    @include('components.input3',[
                        'label' => 'Jam Masak',
                        'name' => 'start_time',
                        'type' => 'time',
                        'value' => '',
                        'modifier' => 'required',
                    ])

                    @include('components.input3',[
                        'label' => 'Jam Turun',
                        'name' => 'finish_time',
                        'type' => 'time',
                        'value' => '',
                        'modifier' => 'required',
                    ])

                    @include('components.input3',[
                        'label' => 'Tukang Masak',
                        'name' => 'operator',
                        'type' => 'text',
                        'value' => '',
                        'modifier' => 'required',
                    ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Print 
                    @include('components.icon', ['icon' => 'print'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>