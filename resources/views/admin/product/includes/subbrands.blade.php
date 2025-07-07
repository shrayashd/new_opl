@if ($subBrands)
    @foreach ($subBrands as $sub)
        <li>
            <input class="" type="radio" @if (in_array($sub->id, $brandsproducts)) {{ 'checked' }} @endif
                name="brand" value="{{ $sub->id }}">
            <label>{{ $sub->name }}</label>
            <ul>
                @if (count($sub->children))
                    @include('admin.product.includes.subbrands', [
                        'subBrands' => $sub->children,
                    ])
                @endif
            </ul>
        </li>
    @endforeach
@endif
