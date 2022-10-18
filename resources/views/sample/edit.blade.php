@foreach($samples as $sample)
<div class="modal fade" id="edit{{ $sample->id }}" tabindex="-1" sample="dialog" aria-labelledby="edit{{ $sample->id }}Label" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $sample->id }}Label">Edit {{ ucfirst('sample') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('samples.update', $sample->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Material</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="material_id">
                            @foreach ($materials as $material)
                                <option 
                                @if($material->id == $sample->material_id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $material->id }}">
                                 {{ $material->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach