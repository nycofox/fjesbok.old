@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @if($message['level'] == 'success')
            @include('vendor.flash.success')
        @elseif($message['level'] == 'error')
            @include('vendor.flash.error')
        @elseif($message['level'] == 'warning')
            @include('vendor.flash.warning')
        @else
            @include('vendor.flash.info')
        @endif
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
