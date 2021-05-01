<div class="col-6">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>{{strtoupper(str_replace('_',' ', 'services'))}}</label>
                <select class="form-control" name="services" wire:model="type">
                    <option value="">None</option>
                    @foreach(\App\Models\User::cards_denom() as $cards)
                        <option value="{{$cards}}">{{$cards}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>{{strtoupper(str_replace('_',' ', 'Denom'))}}</label>
                <select class="form-control" name="denom">
                    @foreach(\App\Models\User::denom_type($type) as $denom)
                        <option value="{{$denom}}">{{$denom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
