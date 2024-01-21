@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="header">
               
                    <div class="col-md-6" style="text-align:left;">
                        <a href="{{ route('tc.index') }}"
                            class="btn btn-info btn-sm">{{ _lang(' New Running student Testimonial') }}</a>
                       
                    </div>

                </div> --}}

                <form action="{{ route('tc.store') }}" method="POST">
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

                                <button id='searchBtnForStudentTC' type="button" class="btn btn-info">Search</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id='student-search-for-tc-add'> </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-script')
    <script>
        $("#searchBtnForStudentTC").click(function() {
            var roll = $("#roll").val();

            console.log('tc');
            $.ajax({
                url: "{{ route('tc.searchStudent') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    roll: roll,


                },

                success: function(data) {
                    $("#student-search-for-tc-add").html(data)
                    console.log('data', data)

                }

            });
        })
    </script>
@stop
