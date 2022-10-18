@foreach($users as $user)
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="edit{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $user->id }}Label">Edit {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
                    'modifier' => 'required',
                ])

                {{-- @include('components.input',[
                    'label' => 'Username',
                    'name' => 'username',
                    'type' => 'text',
                    'value' => $user->username,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Password',
                    'name' => 'password',
                    'type' => 'password',
                    'value' => '',
                    'modifier' => 'required',
                ]) --}}
                
                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option 
                                @if($user->role_id == $role->id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $role->id }}">
                                {{ $role->id }} | {{ $role->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="is_active">
                            @if($user->is_active == 1) 
                                <option {{ 'selected' }} value="1">Active</option>
                                <option value="0">Non-Active</option>
                            @else
                                <option {{ 'selected' }} value="0">Non-Active</option>
                                <option value="1">Aktif</option>
                            @endif
                          </select>
                    </div>
                </div>

                @include('components.input',[
                    'label' => 'HMI',
                    'name' => 'hmi_access',
                    'type' => 'password',
                    'value' => $user->hmi_access,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Entrance',
                    'name' => 'entrance_access',
                    'type' => 'password',
                    'value' => $user->entrance_access,
                    'modifier' => '',
                ])

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