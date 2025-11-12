<div>
    <label for="{{$id??''}}" class="block mb-2 text-sm font-medium">{{$label ?? 'انتخاب'}}</label>
    <select id="{{$id??''}}"
            name="{{$name ?? ''}}"
            class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 outline-0 ">
        <option value="">انتخاب</option>
        {{$slot}}
    </select>
</div>
