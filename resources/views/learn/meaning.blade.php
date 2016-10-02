@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Learn Word Meanings</strong><br>
            </h1>
        </div>
        @if($meaning == null)
            <div class="center-block">
                <h3>We will be back shortly with few more words...</h3>
            </div>
            <div class="row" style="margin-top:30px">
                <div class="col-md-4 col-md-offset-4">
                    <a href="{{url('/learn/meanings')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                            Restart
                        </button></a>
                </div>
            </div>
        @else
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $meaning->image }}" alt="{{ $meaning->word }}" class="img-responsive">
            </div>
            <div class="col-md-8">
                <h2>{{ $meaning->word }}</h2>
                <h4 class="text-muted">{{ $meaning->meaning }}</h4>
            </div>
        </div>
        <div class="row" style="margin-top:30px">
            <div class="col-md-4 col-md-offset-4">
                <a href="{{url('/learn/meanings')}}"><button class="btn btn-primary btn-lg btn-block" type="button" aria-expanded="true">
                        Next Word
                </button></a>
            </div>
        </div>
            <div id="disqus_thread"></div>
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */

                 var disqus_config = function () {
                 this.page.url = '{{url('/learn/meanings/').'/'.$meaning->word}}';  // Replace PAGE_URL with your page's canonical URL variable
                 this.page.identifier = '{{ $meaning->word }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                 };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = '//vocabx.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        @endif
    </div>
@endsection