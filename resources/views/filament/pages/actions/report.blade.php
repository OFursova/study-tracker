<div>
    <p>Olga F</p>
    <br>
    @php $counter = 1; @endphp
    @foreach($records as $key => $category)
        @php
            $header = $counter .') ';
            $header .= match ($key) {
              'Article' => 'Read articles',
              'Book' => 'Read book',
              'Course' => 'Finished course modules',
              'Video' => 'Watched videos',
              default => $key,
            };
            $counter++;
        @endphp
        <h3>{{ $header }}</h3>
        @foreach($category as $item)
            <p>- {{ $item->title }} - {{ $item->url }}</p>
        @endforeach
        <br>
    @endforeach
    <p>Total - 2h</p>
</div>
