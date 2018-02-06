@foreach($categories as $category)
    <option value="{{ $category->_id }}" {{ $selected == $category->_id ? 'selected' : '' }}>
        @for($i = 0; $i < $n; $i++)&nbsp;@endfor
        {!! $category->name !!}
    </option>
    @if(count($category->child) > 0)
        @include('category.option', ['categories' => $category->child, 'n' => $n + 5, 'selected' => $selected])
    @endif
@endforeach

