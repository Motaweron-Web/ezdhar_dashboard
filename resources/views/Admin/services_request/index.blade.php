@extends('Admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}} | طلب خدمة
@endsection
@section('page_name') طلب خدمة @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> طلب خدمة {{($setting->title) ?? ''}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">اسم العميل</th>
                                <th class="min-w-50px">اسم مقدم الخدمة</th>
                                <th class="min-w-50px">القسم</th>
                                <th class="min-w-50px">السعر</th>
                                <th class="min-w-50px">التفاصيل</th>
                                <th class="min-w-50px">تاريخ الطلب</th>
                                 <th class="min-w-50px rounded-end">العمليات</th>
                            </tr>
                            </thead>
                                @foreach($services_request as $service)
                            <tbody>
                            <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->client->first_name }}</td>
                                        <td>{{ $service->freelancer->first_name }}</td>
                                        <td>{{ $service->subCategory->title_ar }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->details }}</td>
                                        <td>{{ $service->created_at->format('m/d/Y') }}</td>
                                        <td>
                                            <form method="post" action="{{ route('delete_services') }}">
                                                @csrf
                                                <input type="hidden" value="{{ $service->id }}" name="id">
                                            <button class="btn btn-pill btn-danger-light" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </form>
                                        </td>
                            </tr>
                            </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف بيانات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل انت متأكد من حذف البيانات التالية <span id="title" class="text-danger"></span>؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            اغلاق
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">حذف !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">بيانات المشرف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('Admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')


@endsection


