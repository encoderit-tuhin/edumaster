@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="header">
               
                    <div class="col-md-6" style="text-align:left;">
                        <a href="{{ route('testimonial.index') }}"
                            class="btn btn-info btn-sm">{{ _lang(' New Running student Testimonial') }}</a>
                       
                    </div>

                </div> --}}

                <form action="{{ route('testimonial.store') }}" method="POST">
                    @csrf

                    <div class="">
                        <div class="col-md-12 row">
                            {{-- <div class="form-group col-md-3">
                            <label class="control-label" for="">Year</label>
                            <input type="text" id="year" class="form-control" placeholder=""
                                aria-describedby="helpId" required name="year">

                        </div> --}}
                            <div class="form-group col-md-3">
                                <label class="control-label" for="">Student Roll</label>
                                <input type="text" id="roll" class="form-control" placeholder=""
                                    aria-describedby="helpId" required name="roll">

                            </div>
                            <div class="form-group col-md-3 mt-5 p-1">

                                <button  type="submit" class="btn btn-info">Search</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id='student-search-for-testimonial-add'> </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-script')
    <script>
        $("#searchBtnTestimonialStudent").click(function() {
            console.log('first')
            var studentId = $("#studentId").val();
            var year = $("#year").val();

            $.ajax({
                url: "{{ route('testimonial.searchStudent') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    year: year,
                    studentId: studentId,


                },

                success: function(data) {
                    $("#student-search-for-testimonial-add").html(data)
                    console.log('data', data)

                }

            });
        })
    </script>
@stop
