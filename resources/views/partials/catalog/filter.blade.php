<aside class="catalog-filters">
    <div class="filter-group">
        <h3 class="filter-title">
            <i class="fas fa-filter"></i> Фильтры
        </h3>
        <form action="">
            <div class="filter-section">
                <h4>Производитель</h4>
                @foreach ($vendors as $vendor)
                    <div class="filter-options">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                            {{ $vendor->title }}
                        </label>
                    </div>
                @endforeach
            </div>
        </form>

    </div>
</aside>
