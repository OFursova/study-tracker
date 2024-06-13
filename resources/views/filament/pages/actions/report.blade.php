<div>
    <p>Olga F</p>
    <br>
    @php $counter = 1; @endphp
    @foreach($records as $key => $category)
        <h3>{{ $counter }}) {{ $key }}</h3>
        @php $counter++; @endphp
        @foreach($category as $item)
            <p>- {{ $item->title }} - {{ $item->url }}</p>
        @endforeach
        <br>
    @endforeach
    <p>Total - 2h</p>
</div>
