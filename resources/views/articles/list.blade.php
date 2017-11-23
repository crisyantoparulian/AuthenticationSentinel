@foreach($articles as $article)
<div align="center">
	<h1>{!!$article->title!!}</h1>
</br>
<div class="portrait">
<img class="img-responsive" alt="" src="/images/{{ $article->image }}" />
</div>
</div>
<p>
 &nbsp{!! str_limit($article->content, 250) !!}
<br/>
<div align="center" >{!! link_to(route('articles.show', $article->id), 'Read More', ['class' => 'ButtonRead']) !!}</div>
</p>
<hr class="style13">

<br/>
@endforeach
<div>
{!! $articles->render() !!}
</div>