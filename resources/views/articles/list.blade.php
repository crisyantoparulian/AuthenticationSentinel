@foreach($articles as $article)
<div align="center">
	<h1>{!!$article->title!!}</h1>
</div>
<p>
 &nbsp{!! str_limit($article->content, 250) !!}
<br/>
<div align="center">{!! link_to(route('articles.show', $article->id), 'Read More') !!}</div>
</p>
<hr class="style13">

<br/>
@endforeach