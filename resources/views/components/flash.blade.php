<?php

use App\Helpers\Flash\Flash;
/**
 * @var Flash $flash
 */

?>

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-toggle="toast" data-bs-config='{!! json_encode($flash->configArray()) !!}'>
    <div class="toast-body bg-{{ $flash->type->value }} bg-gradient text-white rounded bg-opacity-75">
        @if($flash->title)
            <strong class="me-auto">{{ $flash->title }}</strong><br>
        @endif
        {{ $flash->message }}
    </div>
</div>
