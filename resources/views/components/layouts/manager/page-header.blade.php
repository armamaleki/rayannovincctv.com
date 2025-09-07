<div class="page-header d-flex justify-content-end ">
    <div class="w-25 ">
        <form
            action="{{$action}}"
            method="get"
            class="wd-150 mg-b-30">
            <div class="input-group">
                <button
                    type="submit"
                    class="btn btn-primary">جستجو</button>
                <input class="form-control"
                       name="q"
                       value="{{request()->q}}"
                       id="search" placeholder="{{$placeholder}}" type="search">
            </div>
        </form>
    </div>
</div>
