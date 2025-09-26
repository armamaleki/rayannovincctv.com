<div>
    <label for="status" class=" text-sm">
        <span wire:loading.remove>یک وضعیت را انتخاب کنید</span>
        <span wire:loading class="text-green-500 font-bold">صبر کنید</span>
    </label>
    <select
        id="status"
        wire:change="chainge($event.target.value)"
        class="form-control form-select select2 @if($this->product->status == 'deactivate')
              bg-red
             @elseif($this->product->status == 'check')
             bg-warning
             @elseif($this->product->status == 'active')
             bg-success @endif ">
        <option value="deactivate" @if($this->product->status == 'deactivate') selected @endif>غیر فعال</option>
        <option value="check" @if($this->product->status == 'check') selected @endif>چک شود</option>
        <option value="active" @if($this->product->status == 'active') selected @endif>فعال</option>
    </select>

</div>
