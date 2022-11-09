

<div class="modal fade bd-example-modal-md" id="createSKMT" tabindex="-1" sample="dialog" aria-labelledby="createSKMTLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSKMTLabel">Create {{ ucfirst('SKMT') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('skmts.store') }}" enctype="multipart/form-data" class="text-dark" >
                @csrf
                @method('POST')

            
                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Antrian</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="barcode">
                            @foreach ($rafactions_null as $rafaction_null)
                                <option value="{{ $rafaction_null->barcode }}">
                                    {{ $rafaction_null->barcode }} - Meja {{ $rafaction_null->spot }} - {{ $rafaction_null->created_at }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>
                
                @for($i=1; $i<=3; $i++)
                <div class="form-group">
                    <label for="exampleFormControlFile1">Penampakan Tebu {{ $i }}</label>
                    <input 
                        type="file" 
                        class="form-control-file" 
                        accept="image/png, image/gif, image/jpeg" 
                        name="image{{ $i }}"
                    >
                </div>
                @endfor

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>