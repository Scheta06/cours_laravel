@if (session('errors'))
    <div class="message dangar-message">
        <h3>{{ session('errors')['title'] }}</h3>
        <ul>
            @foreach (session('errors')['errors'] as $item)
                <li>
                    <span>- {{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif
