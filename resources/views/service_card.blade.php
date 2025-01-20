@foreach ($services as $service)
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $service->image }}" class="img-fluid rounded-start" alt="{{ $service->image }}"
                    onerror="this.onerror=null;this.src='{{ url('/images/defaul_servise_image.jpg') }}'" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <h7>
                        <small>Этажей: {{ $service->floors }}, Комнат: {{ $service->rooms }},
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
