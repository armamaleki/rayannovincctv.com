@extends('components.layouts.manager.index')
@section('content')
    <x-layouts.manager.page-header
        placeholder="جستجو تگ...."
        action="{{route('manager.tags.index')}}" />
    <div class="card">
        @can('article-create')
            <div class="card-header">
                <h3 class="card-title">مدیریت تگ ها </h3>
                <div class="card-options">
                    <a href="{{route('manager.tags.create')}}" class="btn btn-primary btn-sm">
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
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">نام</th>
                            <th class="border-bottom-0">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $data)
                            <tr>
                                <td>
                                    {{$loop->index +1}}
                                </td>
                                <td>{{$data->name}}</td>

                                <td>
                                    <div aria-label="Basic example" class="btn-group ms-3 mb-3" role="group">
                                        @can('article-show')
                                            <a href="#" class="btn btn-green active" type="button">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </a>
                                        @endcan
                                        @can('article-edit')
                                            <a href="{{route('manager.tags.edit' , $data)}}"
                                               class="btn btn-primary pd-x-25" type="button">
                                                <i class="fa fa-pencil fa-lg"></i>
                                            </a>
                                        @endcan
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

    {{$tags->links()}}
@endsection
