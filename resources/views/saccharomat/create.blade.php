<div class="modal fade" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('saccharomat') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('saccharomats.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Pol Baca',
                    'name' => 'pol',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => '% Brix',
                    'name' => 'percent_brix',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                <div class="form-group row">
                    <label for="percent_pol" class="col-sm-2 col-form-label">% Pol</label>
                    <div class="col-sm-10">
                      <input type="number" step="any" class="form-control" id="percent_pol" value="" name="percent_pol" onkeydown="setPurity()">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="purity" class="col-sm-2 col-form-label">HK</label>
                    <div class="col-sm-10">
                      <input type="number" step="any" class="form-control" id="purity" value="" name="purity" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="yield" class="col-sm-2 col-form-label">Rend</label>
                    <div class="col-sm-10">
                      <input type="number" step="any" class="form-control" id="yield" value="" name="yield" readonly>
                    </div>
                </div>

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

<script>
    function setPurity(){
        if(event.keyCode === 9) {
            mollases_factor = document.getElementById('mollases_factor').innerHTML;
            yield_factor = document.getElementById('yield_factor').innerHTML;
            percent_brix = document.getElementById('percent_brix').value;
            percent_pol = document.getElementById('percent_pol').value;
            purity = (percent_pol / percent_brix) * 100;
            rendemen = yield_factor * (percent_pol - mollases_factor * (percent_brix - percent_pol));
            document.getElementById('purity').value = purity.toFixed(2);
            document.getElementById('yield').value = rendemen.toFixed(2);
        }
    }
</script>
