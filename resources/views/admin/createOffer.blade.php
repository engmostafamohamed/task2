@extends('admin.layouts.lay')
@section('title', 'home')
@section('css')

    <link rel="stylesheet" href="{{ url('assest/admin/plugins/select2/css/select2.min.css') }}">
    <style>
        .col-md-3,
        .col-12 {
            text-align: right;
        }

    </style>
@endsection
@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{--  <h2 class="text-center display-4">أضافة عرض
                </h2>  --}}

                <hr>

                <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>العرض</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" name="name" id="name_ar"
                                                class="form-control form-control-lg" placeholder="offerName"
                                                areia-describedby="helper" value="{{ old('name_ar') }}">
                                            @error('name')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-append">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>المكان</label>
                                        <div class="input-group input-group-lg">

                                            <input type="text" name="place" id="description_ar"
                                                class="form-control form-control-lg" placeholder="place"
                                                areia-describedby="helper" value="{{ old('description_ar') }}">
                                            @error('place')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-append">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>الوصف</label>
                                        <div class="input-group input-group-lg">

                                            <input type="text" name="discription" id="description_ar"
                                                class="form-control form-control-lg" placeholder="description"
                                                areia-describedby="helper" value="{{ old('description_ar') }}">
                                            @error('discription')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-append">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>السعر</label>
                                        <div class="input-group input-group-lg">

                                            <input type="text" name="price" id="description_ar"
                                                class="form-control form-control-lg" placeholder="price"
                                                areia-describedby="helper" value="{{ old('description_ar') }}">
                                            @error('price')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-append">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>أضافه صورة</label>
                                        <div class="input-group input-group-lg">

                                            <input type="file" name="image" id="" class="form-control form-control-lg"
                                                style="padding-bottom: 45px;" placeholder="" areia-describedby="helper">
                                            @error('image')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <button name="page" value="index" type="submit"
                                    class="btn btn-primary btn-lg btn-block">إضافة</button>
                            </div>
                </form>

            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
@endsection
