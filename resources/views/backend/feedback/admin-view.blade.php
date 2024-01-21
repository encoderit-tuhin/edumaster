@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Student Name') }}</th>
                            <th>{{ _lang('Teacher/Staff') }}</th>
                            <th>{{ _lang('Feedback') }}</th>
                        </thead>
                        <tbody>
                            @if (isset($feedbacks))
                                @foreach ($feedbacks as $row)
                                    @php
                                        $data = json_decode($row->data, true);
                                        // dd($data['student']);
                                    @endphp
                                    <tr>
                                        <td>{{ $data['student'] ?? 'N/A' }}</td>
                                        <td>{{ $data['staff'] ?? 'N/A' }}</td>
                                        <td>{{ $data['feedback'] ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger">{{ __('No Students Found') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $("#class_id_select").change(function() {
            var class_id = $(this).val();
            var _token = $('input[name=_token]').val();
            var class_id = $('select[name=class_id]').val();
            $.ajax({
                type: "POST",
                url: "{{ url('sections/section') }}",
                data: {
                    _token: _token,
                    class_id: class_id
                },
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(sections) {
                    $("#preloader").css("display", "none");
                    $('select[name=section_id]').html(sections);
                }
            });
        });
    </script>
@stop
