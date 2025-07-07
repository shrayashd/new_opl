<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Parent category</h4>
        </div>

        <div class="panel-body card-pannel">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($categorys as $category)
                    <li>
                        <input class="" type="radio" name="parent_id"
                            @if (in_array($category->id, $categoryParents)) {{ 'checked' }} @endif value="{{ $category->id }}">
                        <label for="option">
                            @if (Request::segment(3) != 'create')
                                @if ($category->id == $category->id)
                                    <strong>{{ $category->name }}</strong>
                                @else
                                    {{ $category->name }}
                                @endif
                            @else
                                {{ $category->name }}
                            @endif
                        </label>
                        <ul>
                            @if (count($category->children))
                                @include('admin.category.includes.subparent', [
                                    'subParent' => $category->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
