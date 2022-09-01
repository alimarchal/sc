<div class="col-6">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>{{strtoupper(str_replace('_',' ', 'Role'))}}</label>
            <select class="form-control" name="role" required  wire:model="type">
                <option value="">None</option>
                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label>{{strtoupper(str_replace('_',' ', 'designation'))}}</label>

            <select class="form-control" name="designation">
                @foreach(\App\Models\User::role_type($type) as $denom)
                    <option value="{{$denom}}">{{$denom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>

</div>
