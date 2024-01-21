<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -999 !important;
        background-color: #000;
    }
</style>

<div class="col-lg-12">
    <div class="panel-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            <br />
        @endif

        <form method="post" class="" autocomplete="off" id="delete-form"
            action="{{ route('payslip.delete.store', $collection->invoice_id ?? 0) }}">
            @csrf
            @method('DELETE')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Invoice ID') }}</th>
                        <th>{{ __('Student ID') }}</th>
                        <th>{{ __('Student Name') }}</th>
                        <th>{{ __('Student Roll') }}</th>
                        <th>{{ __('Total Payable') }}</th>
                        <th>{{ __('Total Paid') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($collections as $collection)
                        <tr>
                            <td>{{ $collection->invoice_id }}</td>
                            <td>{{ $collection->student_id }}</td>
                            <td>{{ $collection->student->first_name ?? '--' }}</td>
                            <td>{{ $collection->student->studentSession->roll ?? '--' }}</td>
                            <td>{{ format_currency($collection->total_payable) }}</td>
                            <td>{{ format_currency($collection->total_paid) }}</td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-trash"></i> &nbsp;
                                    {{ _lang('Delete') }}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <p class="text-danger">{{ _lang('No data found') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#delete-form').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                swal({
                        title: "{{ _lang('Are you sure?') }}",
                        text: "{{ _lang('Once deleted, you will not be able to recover this data!') }}",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) form.submit();
                    });
            });
        });
    </script>
@endsection
