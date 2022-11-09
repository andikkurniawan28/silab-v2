

<div class="modal fade bd-example-modal-xl" id="meja_1" tabindex="-1" sample="dialog" aria-labelledby="meja_1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meja_1Label">Meja Tebu 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('rafactions.assign') }}" class="text-dark">
                @csrf
                @method('POST')

                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Antrian</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="barcode">
                            @foreach ($rafactions_unscored[1] as $rafaction_unscored)
                                <option value="{{ $rafaction_unscored->barcode }}">
                                    {{ $rafaction_unscored->barcode }} 
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>
                
                @foreach($dirts as $dirt)
                <div class="form-group row">
                <label for="spot" class="col-sm-2 col-form-label">{{ ucfirst($dirt->name) }}</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i < $dirt->interval; $i++)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $dirt->name }}" id="{{ $dirt->name }}" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="{{ $dirt->name }}">
                                <strong>{{ $i }}</strong>
                            </label>
                        </div>
                        @endfor
                    </div>
                </div>
                @endforeach

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