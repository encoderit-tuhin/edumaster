<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>{{ _lang('Mark Distribution Type') }}</td>
                <td>{{ $markDistribution->mark_distribution_type }}</td>
            </tr>
            <tr>
                <td>{{ _lang('Mark Percentage') }}</td>
                <td>{{ $markDistribution->mark_percentage }}</td>
            </tr>
            <tr>
                <td>{{ _lang('Active') }}</td>
                <td>{{ $markDistribution->is_active }}</td>
            </tr>
        </table>
    </div>
</div>
