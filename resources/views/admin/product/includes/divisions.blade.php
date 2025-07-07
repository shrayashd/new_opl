<div class="form-group">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Division</h4>
        </div>

        <div class="panel-body card-pannel">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($divisions as $division)
                    <li>
                        <input class="" id="division-{{ $division->id }}" type="radio" name="division_id"
                            @if (in_array($division->id, $divisionProducts)) {{ 'checked' }} @endif
                            value="{{ $division->id }}"><label
                            for="division-{{ $division->id }}">{{ $division->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
