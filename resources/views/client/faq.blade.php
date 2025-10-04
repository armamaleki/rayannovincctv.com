
@extends('components.layouts.app.index')
@section('meta')
    <title>سوالات متداول رایان نوین</title>
    <meta name="description" content="سوالات متداول رایان نوین">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'سوالات متداول',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="سوالات متداول" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div
            class="border-b border-dashed p-2 rounded-md "
            x-data="{ expanded: false }">
            <button
                class="flex gap-1 items-center"
                @click="expanded = ! expanded">
                <x-icons.question-mark-circle/>
                    سوال یک

            </button>

            <div x-show="expanded" x-collapse>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
            </div>
        </div><div
            class="border-b border-dashed p-2 rounded-md "
            x-data="{ expanded: false }">
            <button
                class="flex gap-1 items-center"
                @click="expanded = ! expanded">
                <x-icons.question-mark-circle/>
                    سوال یک

            </button>

            <div x-show="expanded" x-collapse>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
            </div>
        </div><div
            class="border-b border-dashed p-2 rounded-md "
            x-data="{ expanded: false }">
            <button
                class="flex gap-1 items-center"
                @click="expanded = ! expanded">
                <x-icons.question-mark-circle/>
                    سوال یک

            </button>

            <div x-show="expanded" x-collapse>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
            </div>
        </div><div
            class="border-b border-dashed p-2 rounded-md "
            x-data="{ expanded: false }">
            <button
                class="flex gap-1 items-center"
                @click="expanded = ! expanded">
                <x-icons.question-mark-circle/>
                    سوال یک

            </button>

            <div x-show="expanded" x-collapse>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus blanditiis cupiditate distinctio expedita id iusto laudantium maxime nam, neque, officiis, perspiciatis quae quam quod reiciendis repudiandae saepe sunt tempore?
            </div>
        </div>
    </div>
@endsection

