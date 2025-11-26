@extends('components.layouts.manager.index')
@section('content')
    <x-layouts.manager.page-header
        placeholder="جستجو لیست قیمت...."
        action="{{route('manager.price-list.index')}}" />
    <div class="card">
        @can('article-create')
            <div class="card-header">
                <h3 class="card-title">مدیریت لیست قیمت ها</h3>
                <div class="card-options">
                    <a href="{{route('manager.price-list.create')}}" class="btn btn-primary btn-sm">
                        اضافه کردن
                    </a>
                </div>
            </div>
        @endcan
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">نام</th>
                            <th class="border-bottom-0">وضعیت</th>
                            <th class="border-bottom-0">نویسنده</th>
                            <th class="border-bottom-0">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($priceLists as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>
                                    <livewire:manager.price-list-status priceList="{{$data->id}}" />
                                </td>
                                <td>{{$data->user->name}}</td>

                                <td>
                                    <div aria-label="Basic example" class="btn-group ms-3 mb-3" role="group">
                                            <a href="#" class="btn btn-green active" type="button">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </a>
                                            <a href="{{route('manager.price-list.edit' , $data)}}"
                                               class="btn btn-primary pd-x-25" type="button">
                                                <i class="fa fa-pencil fa-lg"></i>
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$priceLists->links()}}
@endsection
