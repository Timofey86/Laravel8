<?php

    ?>

{{--<div {{$attributes->merge(['class' =>'test', 'disabled' => true])}}>--}}
<div {{$attributes->class(['tester' => true /*condition*/])}}>
    <div {{$header->attributes->class(['testttt'])}}>
        {{$header}}
    </div>

    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    {{$slot}}

    {{$footer}}
</div>
