<?php

use App\Models\Post;
/**
 * @var Post[] $posts
 */



?>
<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    Hello world! {{$posts->count()}} <br>
    {{$count}}<br>
    {{$test('Test!')}}
</div>
