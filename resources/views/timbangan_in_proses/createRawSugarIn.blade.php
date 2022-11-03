<div class="modal fade" id="createRawSugarIn" tabindex="-1" role="dialog" aria-labelledby="createRawSugarInLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Raw Sugar In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('adjust_timbangan_rs_in') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Date',
                    'name' => 'date',
                    'type' => 'date',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Time',
                    'name' => 'time',
                    'type' => 'time',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Netto',
                    'name' => 'netto',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
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