@if (session('errors'))
    <div class="message dangar-message">
        <h3>{{ session('errors')['title'] }}</h3>
        <div>
            @foreach(session('errors')['errors'] as $item)
                <span>{{ $item }}</span>
            @endforeach
        </div>
    </div>
@endif
