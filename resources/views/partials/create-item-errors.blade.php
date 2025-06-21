@if($errors->any())
    <div class="message dangar-message">
        <h3>Произошли ошибки при создании компонента</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <span>- {{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif
