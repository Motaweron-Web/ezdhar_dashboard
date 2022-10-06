@extends('Admin/layouts/master')
@section('title')
    {{($setting->title) ?? 'الصفحة الرئيسية'}} | لوحة التحكم
@endsection
@section('page_name')
    الرئـيسية
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="bold font-weight-bolder">عدد المشاريع</h6>
                            <h3 class="mb-2 number-font">{{ $projects->count() }}</h3>
                            <div class="progress h-2">
                                <div class="progress-bar bg-orange
                                    @if($projects->count() > 5 )
                                 w-10
                                @elseif($projects->count() > 15)
                                    w-25
                                @elseif($projects->count() > 45)
                                    w-50
                                @elseif($projects->count() > 70)
                                    w-75
                                @elseif($projects->count() > 90)
                                    w-100
                                @elseif($projects->count() > 150)
                                    w-260
                                @elseif($projects->count() > 200)
                                    w-337
                                 @endif
                                " role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="bold font-weight-bolder">عدد الاقسام</h6>
                            <h3 class="mb-2 number-font">{{ $category->count() }}</h3>
                            <div class="progress h-2">
                                <div class="progress-bar bg-secondary
                                @if($category->count() > 5 )
                                 w-10
                                @elseif($category->count() > 15)
                                    w-25
                                @elseif($category->count() > 45)
                                    w-50
                                @elseif($category->count() > 70)
                                    w-75
                                @elseif($category->count() > 90)
                                    w-100
                                @elseif($category->count() > 150)
                                    w-260
                                @elseif($category->count() > 200)
                                    w-337
                                 @endif
                                " role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="">عدد العملاء</h6>
                            <h3 class="mb-2 number-font">{{ $users->count() }}</h3>
                            <div class="progress h-2">
                                <div class="progress-bar bg-secondary1
                                @if($users->count() > 5 )
                                 w-10
                                @elseif($users->count() > 15)
                                    w-25
                                @elseif($users->count() > 45)
                                    w-50
                                @elseif($users->count() > 70)
                                    w-75
                                @elseif($users->count() > 90)
                                    w-100
                                @elseif($users->count() > 150)
                                    w-260
                                @elseif($users->count() > 200)
                                    w-337
                                 @endif"
                                     role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-sm-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الرسائل</h3>
                    <span class="btn btn-sm btn-danger">{{$contactus->count()}}</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover  mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الموضوع</th>
                                <th>الرسالة</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($contactus as $contact)
                            <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-lg-4 col-md-12 col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">Traffic by Site</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow-none">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <i class="bx bxl-facebook fs-40 text-primary"></i>
                                        <h4 class="mt-3 mb-0 number-font fs-20">8,209</h4>
                                        <p class="text-muted mb-0">FaceBook</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow-none">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <i class="bx bxl-google-plus fs-40 text-danger"></i>
                                        <h4 class="mt-3 mb-0 number-font fs-20">7,210</h4>
                                        <p class="text-muted mb-0">Google</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow-none mb-lg-0">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <i class="bx bxl-youtube fs-40 text-orange"></i>
                                        <h4 class="mt-3 mb-0 number-font fs-20">6,234</h4>
                                        <p class="text-muted mb-0">Youtube</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow-none mb-0">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <i class="bx bxl-twitter fs-40 text-info"></i>
                                        <h4 class="mt-3 mb-0 number-font fs-20">4,567</h4>
                                        <p class="text-muted mb-0">Twitter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')

@endsection

