<div class="meta">
  <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
  <p class="byline author vcard">
    {{ __('By', 'sage') }} {{ get_the_author() }}
    {{-- {{ get_the_author() }} --}}
  </p>
</div>

{!! App::share() !!}
