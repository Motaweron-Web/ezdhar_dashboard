@extends('Admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}} | الاعدادت
@endsection
@section('page_name') الاعدادت @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> الاعدادت {{($setting->title) ?? ''}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-wrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">من نحن بالعربية</th>
                                <th class="min-w-125px">من نحن بالانجليزية</th>
                                <th class="min-w-50px">الشروط و الاحكام بالعربية</th>
                                <th class="min-w-125px">الشروط و الاحكام بالانجليزية</th>
                                <th class="min-w-50px">الخصوصية بالعربية</th>
                                <th class="min-w-125px">الخصوصية بالانجليزية</th>

                                <th class="min-w-50px rounded-end">العمليات</th>
                            </tr>
                            </thead>
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
                        <h5 class="modal-title" id="example-Modal3">بيانات الاعدادات </h5>
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
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'about_ar', name: 'about_ar'},
            {data: 'about_en', name: 'about_en'},
            {data: 'terms_ar', name: 'terms_ar'},
            {data: 'terms_en', name: 'terms_en'},
            {data: 'privacy_ar', name: 'privacy_ar'},
            {data: 'privacy_en', name: 'privacy_en'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('settings.index')}}', columns);
        // Delete Using Ajax
        deleteScript('{{route('delete_setting')}}');
        // Add Using Ajax
        showAddModal('{{route('settings.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('settings.edit',':id')}}');
        editScript();
    </script>
@endsection


