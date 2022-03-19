@extends('admin.layouts.lay')
@section('title', 'home')

@section('content')


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (session()->has('success'))
                        <div class="alert alert-success mt-5 " role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">قائمة الالعاب </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example10" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>العرض</th>
                                            <th>المكان</th>
                                            <th>الوصف</th>
                                            <th>السعر</th>
                                            <th>أضافه صورة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($offers)
                                            @foreach ($offers as $offer)
                                                    <tr>
                                                        <td>{{$offer->name}}</td>
                                                        <td>{{$offer->place}}</td>
                                                        <td>{{$offer->discription}}</td>
                                                        <td>{{$offer->price}}</td>
                                                        <td><img height="100px" width="100px" src="{{$offer->image?url('/').'/images/offer/'.$offer->image :'https://via.placeholder.com/100'}}" alt="" class="img-responsive img-rounded"></td>

                                                        <td>
                                                            <form method="post" action="{{route('offers.destroy', $offer->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                    <ul class="pagination">
                                      <li class="page-item">
                                        {{--  <a class="page-link" href="{{ $games->nextPageUrl()}}" aria-label="Next">
                                          <span aria-hidden="true">NEXT PAGE</span>
                                          <span class="sr-only">Next</span>
                                        </a>  --}}
                                      </li>
                                      {{--  <h3>   {{$games->currentPage()}} </h3>  --}}
                                      <li class="page-item">
                                        {{--  <a class="page-link" href="{{ $games->previousPageUrl()	 }}" aria-label="Previous">
                                          <span aria-hidden="true">LAST PAGE</span>
                                          <span class="sr-only">Previous</span>
                                        </a>  --}}
                                      </li>
                                    </ul>
                                  </nav>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>

@endsection
@section('js')


    <script>
        $(function() {
            $("#example10").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

                "bPaginate": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example10_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
