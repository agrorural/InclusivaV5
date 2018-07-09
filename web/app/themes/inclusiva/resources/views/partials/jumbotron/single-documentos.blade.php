<div class="jumbotron jumbotron-fluid jumbotron-single-documentos" @if (has_post_thumbnail()) style="background-image: url({{ get_the_post_thumbnail_url() }})" @endif>
  <div class="container">
    @include('partials.page-header.single-documentos')
  </div>
</div>