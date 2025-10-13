<div class=" space-y-2">

    <label for="status" class=" text-sm">
        <span wire:loading.remove>یک دسترسی را انتخاب کنید</span>
        <span wire:loading class="text-green-500 font-bold">صبر کنید</span>
    </label>
    <select id="status"
            wire:change="chainge($event.target.value)"
    class="form-control form-select">
        <option value="">انتخاب دسترسی</option>
        @foreach($roles as $role)
            <option value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
    @foreach($userRole->roles as $roleName)
        <span class="border-b">{{$roleName->name}}</span>
    @endforeach
</div>
