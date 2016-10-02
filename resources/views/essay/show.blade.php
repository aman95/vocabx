@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><strong>Topic</strong>: {{ $essay->topic }}<br>
                <small>Submit your essays below...</small>
            </h1>
            <p class="text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($essay->created_at))->toFormattedDateString() }}</p>
        </div>

        <div id="disqus_thread"></div>
        <script>

            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
            /*
             var disqus_config = function () {
             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
             };
             */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//vocabx.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    </div>
@endsection