@if (\App\Libraries\Helper::ping($url))
    <span class="status status-online" data-toggle="tooltip" data-placement="left" title="online">

    </span>
@else
    <span class="status status-offline" data-toggle="tooltip" data-placement="left" title="offline">

    </span>
@endif