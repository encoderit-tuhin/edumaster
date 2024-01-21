@extends('layouts.backend')

@section('title', ucfirst($type) . ' ' . _lang('Transaction'))

@section('content')
    @include('backend.account_transactions._form', [
        'type' => $type,
    ])
@endsection

@section('js-script')
    <script>
        $(document).ready(function() {
            // Add row
            $(document).on("click", ".add-row", function() {
                var newRow = $(this).closest("tr").clone();
                newRow.find("select").val('');
                newRow.find("input[type='number']").val('0');
                $(this).closest("tr").after(newRow);
            });

            // Remove row
            $(document).on("click", ".remove-row", function() {
                if ($("tbody tr").length > 1) {
                    $(this).closest("tr").remove();
                }
            });
        });
    </script>
@endsection
