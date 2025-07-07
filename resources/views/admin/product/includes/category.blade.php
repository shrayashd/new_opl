<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Category</h4>
        </div>

        <div class="panel-body card-pannel">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($categories as $category)
                    <li>
                        <input class="" id="category-{{ $category->id }}" type="checkbox" name="category[]"
                            @if (in_array($category->id, $categoryProducts)) {{ 'checked' }} @endif
                            value="{{ $category->id }}"><label
                            for="category-{{ $category->id }}">{{ $category->name }}</label>
                        <ul>
                            @if (count($category->children))
                                @include('admin.product.includes.subcategory', [
                                    'subCategory' => $category->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
