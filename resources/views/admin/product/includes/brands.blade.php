<div class="form-group">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Brands</h4>
        </div>

        <div class="panel-body card-pannel">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($brands as $brand)
                    <li>
                        <input class="" id="brand-{{ $category->id }}" type="radio" name="brand"
                            @if (in_array($brand->id, $brandProducts)) {{ 'checked' }} @endif
                            value="{{ $brand->id }}"><label
                            for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                        <ul>
                            @if (count($brand->children))
                                @include('admin.product.includes.subbrands', [
                                    'subBrands' => $brand->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
