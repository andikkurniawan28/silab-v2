<div class="modal fade" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Create {{ ucfirst('boiler') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('boilers.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'TDS',
                    'name' => 'tds',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'pH',
                    'name' => 'ph',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Hardness',
                    'name' => 'hardness',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Phospate',
                    'name' => 'phospate',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>