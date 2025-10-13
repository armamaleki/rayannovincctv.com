<div>
    <div class="d-flex gap-2">
        {{number_format($product->price)}}
        <button
            wire:click.prevent="edit"
            wire:loading.attr="disabled"
            class="btn btn-primary">
            <div wire:loading>
                صبر کن
            </div>
            <i wire:loading.remove class="fa fa-pencil fa-lg"></i>
        </button>
    </div>
    @if($updateForm)
        <form
            class="d-flex gap-1 mt-2"
            wire:submit.prevent="update">
            <input
                wire:model="price"
                class="form-control mb-4" placeholder="Input box" type="text">
            <button
                wire:loading.attr="disabled"
                class="btn btn-primary">
                <div wire:loading>
                    صبر کن
                </div>
                <i wire:loading.remove class="fa fa-check fa-lg"></i>
            </button>
        </form>
    @endif
</div>
