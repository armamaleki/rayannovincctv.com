@extends('components.layouts.manager.index')
@section('content')

    <x-layouts.manager.page-header
        placeholder="جستجو مقدار...."
        action="{{route('manager.value.index')}}" />
    <div class="card">
        <div class="card-header">
            <div class="card-title">مقدار های ویژگی</div>
            @can('attribute-value-create')
                <div class="card-options">
                    <a href="{{route('manager.value.create')}}" class="btn btn-primary btn-sm">
                        اضافه کردن
                    </a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">نام</th>
                            <th class="border-bottom-0">ویژگی</th>
                            <th class="border-bottom-0">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $data)
                            <tr>
                                <td>{{$data->value}}</td>
                                <td>{{$data->attribute->name}}</td>
                                <td>
                                    <div aria-label="Basic example" class="btn-group ms-3 mb-3" role="group">
                                        @can('attribute-value-show')
                                            <a href="#" class="btn btn-green active" type="button">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </a>
                                        @endcan
                                        @can('attribute-value-edit')
                                            <a href="{{route('manager.value.edit' , $data)}}"
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
