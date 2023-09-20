 @foreach ($colors as $color)
    <div data-colorid="{{ $color->id }}"  class="color-indigator-item colorbutton" style="background-color:{{ $color->color }};border:2px #f00;"></div>
@endforeach
