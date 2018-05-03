<article @php(post_class('row'))>
  <figure class="entry-image col-sm-12 col-md-6">
    <picture>
      <img src="{!! App::image('card-vertical-thumb') !!}" alt="{!! get_the_title() !!}" class="img-fluid">
    </picture>
  </figure>
  
  <div class="entry-content col-sm-12 col-md-6">
      <header>
        <h1 class="entry-title">{{ get_the_title() }}</h1>
        <h6>{!! Product::brand() !!}</h6>
        S/ {{Product::info()->price}} x {{Product::info()->pres}}
      </header>

        {{-- @php(var_dump(Product::producer()->email)) --}}

        <button class="btn btn-lg btn-block btn-primary" @if( Product::producer()->email === 'Sin especificar' ) disabled="disabled" @endif>Contactar al productor</button>
        
        <details>
          <summary>Descripción</summary>
          @php(the_content())
        </details>
        <details>
          <summary>Información del Producto</summary>
          <dl class="row">
            <dt class="col-sm-4">Registro</dt>
            <dd class="col-sm-8">{{Product::info()->reg}}</dd>
            <dt class="col-sm-4">Beneficiarios</dt>
            <dd class="col-sm-8">{{Product::info()->ben}} familias</dd>
            <dt class="col-sm-4">Mínimo</dt>
            <dd class="col-sm-8">{{Product::info()->min}}</dd>
            <dt class="col-sm-4">Máximo</dt>
            <dd class="col-sm-8">{{Product::info()->max}}</dd>
            <dt class="col-sm-4">Productor</dt>
            <dd class="col-sm-8">{{Product::producer()->ruc}}</dd>
          </dl>
        </details>
        <details>
          <summary>Información del Productor</summary>
          <dl class="row">
              <dt class="col-sm-4">Productor</dt>
              <dd class="col-sm-8">{!! Product::producer()->name !!}</dd>
            <dt class="col-sm-4">RUC</dt>
            <dd class="col-sm-8">{{Product::producer()->ruc}}</dd>
            <dt class="col-sm-4">Teléfono</dt>
            <dd class="col-sm-8">{{Product::producer()->phone}}</dd>
            <dt class="col-sm-4">Correo</dt>
            <dd class="col-sm-8">{{Product::producer()->email}}</dd>
          </dl>
        </details>
  </div>
</article>
