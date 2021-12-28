@foreach($posts as $post)
<p>
    {{ $post->post_author }} has uploaded {{ $post->post_title }} <a href="{{ url('single/'.$post->post_slug) }}">Check it Out!</a>
</p>
@endforeach