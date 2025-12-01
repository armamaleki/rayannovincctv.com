@extends('components.layouts.manager.index')
@section('content')

    <x-layouts.manager.page-header
        placeholder="جستجو مقاله...."
        action="{{route('manager.article.index')}}" />
    <div class="card">
        @can('article-create')
            <div class="card-header">
                <h3 class="card-title">مدیریت مقالات</h3>
                <div class="card-options">
                    <a href="{{route('manager.article.create')}}" class="btn btn-primary btn-sm">
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
                            <th class="border-bottom-0">اواتار</th>
                            <th class="border-bottom-0">نام</th>
                            <th class="border-bottom-0">وضعیت</th>
                            <th class="border-bottom-0">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $data)
                            <tr>
                                <td>
                                    @if($data->getMedia('avatars')->isNotEmpty())
                                        <img class="avatar avatar-xxl brround"
                                             src="{{ $data->getMedia('avatars')->first()->getUrl('thumb') }}" alt="">
                                    @endif
                                </td>
                                <td>{{$data->name}}</td>
                                <td>
                                    @can('article-status')
                                        <livewire:manager.article-status article="{{$data->id}}" />
                                    @endcan
                                </td>
                                <td>
                                    <div aria-label="Basic example" class="btn-group ms-3 mb-3" role="group">
                                        @can('article-show')
                                            <a href="#" class="btn btn-green active" type="button">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </a>
                                        @endcan
                                        @can('article-edit')
                                            <a href="{{route('manager.article.edit' , $data)}}"
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

    {{$articles->links()}}
@endsection


@push('js')
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.js')}}"></script>
@endpush
