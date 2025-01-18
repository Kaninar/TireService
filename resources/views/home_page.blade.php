@section('title', 'Home')
<!DOCTYPE html>

<head>
    <base href="http://www.example.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/home_page.css') }} ">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <header>

    </header>







    <div>
        <div class="container">
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">


            </form>
        </div>
    </div>
    <div class="container">

        <main>
            <div class="home-page_content">
                <div class="filter-container">
                    <div class="list-group">
                        {{-- фото --}}
                        <div class="list-group-item">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="image_check"
                                        value="checkedValue"> Есть фото
                                </label>
                            </div>
                        </div>
                        {{-- слово --}}
                        <div class="list-group-item">
                        </div>
                        {{-- комнаты --}}
                        <div class="list-group-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Количество комнат
                                </button>
                            </h2>
                            @foreach ($distinct_rooms as $count)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id=""
                                            value="checkedValue"> {{ $count->rooms_count }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        {{-- от до --}}
                        <div class="list-group-item">
                            <div class="wrapper">
                                <div class="element">
                                    <div class="price-input">
                                        <div class="field">
                                            <span>Min</span>
                                            <input type="number" class="input-min" value="2500">
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                            <span>Max</span>
                                            <input type="number" class="input-max" value="7500">
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" class="range-min" min="0" max="10000"
                                            value="2500" step="100">
                                        <input type="range" class="range-max" min="0" max="10000"
                                            value="7500" step="100">
                                    </div>
                                </div>
                            </div>
                            <script>
                                const slider = (element) => {
                                    const slider = Boolean(element.classList) ? element : document.querySelector(selector);
                                    const rangeInput = slider.querySelectorAll(".range-input input");
                                    const priceInput = slider.querySelectorAll(".price-input input");
                                    const range = slider.querySelector(".slider .progress");

                                    let priceGap = 1000;

                                    priceInput.forEach(input => {
                                        input.addEventListener("input", e => {
                                            let minPrice = parseInt(priceInput[0].value),
                                                maxPrice = parseInt(priceInput[1].value);

                                            if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                                                if (e.target.className === "input-min") {
                                                    rangeInput[0].value = minPrice;
                                                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                                                } else {
                                                    rangeInput[1].value = maxPrice;
                                                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                                                }
                                            }
                                        });
                                    });

                                    rangeInput.forEach(input => {
                                        input.addEventListener("input", e => {
                                            let minVal = parseInt(rangeInput[0].value),
                                                maxVal = parseInt(rangeInput[1].value);
                                            if ((maxVal - minVal) < priceGap) {
                                                if (e.target.className === "range-min") {
                                                    rangeInput[0].value = maxVal - priceGap
                                                } else {
                                                    rangeInput[1].value = minVal + priceGap;
                                                }
                                            } else {
                                                priceInput[0].value = minVal;
                                                priceInput[1].value = maxVal;
                                                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                                                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                                            }
                                        });
                                    });
                                }

                                document.querySelectorAll(".element").forEach(n => slider(n));
                            </script>
                        </div>
                        <div class="list-group-item">
                            <button type="button" class="btn btn-outline-secondary">Сбросить</button>
                            <button type="button" id="prime" class="btn btn-primary"
                                onclick="changeRoute()">Применить
                                <script>
                                    function changeRoute() {

                                        if (document.getElementById('image_check').checked) {
                                            {{ route('home', ['image' => 'true']) }}
                                        } else {
                                            {{ route('home', ['image' => 'false']) }}
                                        }
                                    }
                                </script>
                            </button>
                        </div>
                    </div>


                </div>
                <div class="container">
                    @foreach ($tire_services as $service)
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $service->image }}" class="img-fluid rounded-start"
                                        alt="{{ $service->image }}"
                                        onerror="this.onerror=null;this.src='{{ url('/images/defaul_servise_image.jpg') }}'" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $service->name }}</h5>
                                        <h7>
                                            <small>Этажей: {{ $service->floor }}, Комнат: {{ $service->rooms_count }},
                                                Площадь:
                                                {{ $service->area }} м²</small>
                                        </h7>
                                        <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                        <p class="card-text">{{ $service->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="container">
                <div>
                    {{ $tire_services->withQueryString()->links() }}
                </div>
            </div>
        </main>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                        class="bi bi-car-front-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2024 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a class="text-body-secondary" href="https://t.me/Kaninar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-telegram" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                        </svg>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-body-secondary" href="https://www.instagram.com/hideo_kojima">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-body-secondary" href="https://x.com/elonmusk">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </footer>
    </div>

</body>
