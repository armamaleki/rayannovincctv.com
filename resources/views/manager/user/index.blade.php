@extends('components.layouts.manager.index')
@section('content')

    <x-layouts.manager.page-header
        placeholder="جستجو کاربر...."
        action="{{route('manager.user.index')}}" />
    <div class="card">
        <div class="card-header">
            <div class="card-title">کاربران</div>
            <div class="card-options">
                <a href="{{route('manager.user.create')}}" class="btn btn-primary btn-sm">
                    اضافه کردن
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">نام</th>
                            <th class="border-bottom-0">شماره تلفن</th>
                            <th class="border-bottom-0">دسترسی</th>
                            <th class="border-bottom-0">آخرین ورود</th>
                            <th class="border-bottom-0">زمان ثبت نام</th>
                            <th class="border-bottom-0">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->getRoleNames()}}</td>
                                <td>{{jdate($user->updated_at)->ago()}}</td>
                                <td>{{jdate($user->created_at)}}</td>
                                <td>
                                    <div aria-label="Basic example" class="btn-group ms-3 mb-3" role="group">
                                        <a href="#" class="btn btn-green active" type="button">
                                            <i class="fa fa-eye fa-lg"    ></i>
                                        </a>
                                        <a href="#" class="btn btn-primary pd-x-25" type="button">
                                            <i class="fa fa-pencil fa-lg"    ></i>
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
@endsection
