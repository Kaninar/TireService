<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/home_page.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/area_range_slider.css') }}">
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/storage.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div>
        @include('header')
    </div>
    <main>
        <div class="home-page-content">
            <div class="filter-container container-fluid">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="image-check"
                                    onclick="fetchFilteredItems()"> Есть фото
                            </label>
                        </div>
                    </div>
                    <div class="list-group-item">
                        @include('name_searchbar')
                    </div>
                    <div class="list-group-item">
                        <h6>Количество комнат</h6>
                        @foreach ($distinct_rooms as $room)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input room-checkbox" type="checkbox"
                                        data-role="{{ $room->value }}" value="checkedValue">
                                    {{ $room->value }} <span class="filter-count">({{ $room->count }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="list-group-item">
                        @include('area_range_slider', ['area_bounds' => $area_bounds])
                    </div>
                </div>
            </div>
            <div class="container-fluid results" id="results">
                @include('service_card', ['services' => $services])
            </div>
        </div>
        </div>
        <div class="container-fluid" id="pages">
            @include('pagination', ['services' => $services])
        </div>
    </main>
    @include('footer')
</body>
