

<div class="modal fade bd-example-modal-xl" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Create {{ ucfirst('Scoring MBS') }}</h5>
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
                            @foreach ($rafactions_unscored as $rafaction_unscored)
                                <option value="{{ $rafaction_unscored->barcode }}">
                                    {{ $rafaction_unscored->barcode }} - Meja {{ $rafaction_unscored->spot }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spot" class="col-sm-2 col-form-label">Pucuk</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i <= 50; $i=$i+5)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pucuk" id="pucuk" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="pucuk"><strong>{{ $i }}%</strong></label>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spot" class="col-sm-2 col-form-label">Sogolan</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i <= 50; $i=$i+5)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sogolan" id="sogolan" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="sogolan"><strong>{{ $i }}%</strong></label>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spot" class="col-sm-2 col-form-label">Daduk</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i <= 50; $i=$i+5)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="daduk" id="daduk" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="daduk"><strong>{{ $i }}%</strong></label>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spot" class="col-sm-2 col-form-label">Akar</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i <= 50; $i=$i+5)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="akar" id="akar" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="akar"><strong>{{ $i }}%</strong></label>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group row">
                    <label for="spot" class="col-sm-2 col-form-label">Tali Pucuk</label>
                    <div class="col-sm-10">
                        @for($i = 0; $i <= 50; $i=$i+5)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tali_pucuk" id="tali_pucuk" value="{{ $i }}"
                                @if($i == 0)
                                checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="tali_pucuk"><strong>{{ $i }}%</strong></label>
                        </div>
                        @endfor
                    </div>
                </div>

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