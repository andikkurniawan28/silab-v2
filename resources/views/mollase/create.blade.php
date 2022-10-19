<div class="modal fade" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Create {{ ucfirst('mollase') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('mollases.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input3',[
                    'label' => 'Volume T1',
                    'name' => 'volume_t1',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Volume T2',
                    'name' => 'volume_t2',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Volume T3',
                    'name' => 'volume_t3',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Meteran',
                    'name' => 'meters',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>