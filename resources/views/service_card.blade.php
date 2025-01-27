@if (count($services) <= 0)
    <div class="tenor-gif-embed" data-postid="22643763" data-share-method="host" data-aspect-ratio="1.77778"
        data-width="100%"><a
            href="https://tenor.com/view/%D1%87%D1%83%D0%B2%D0%B0%D0%BA-%D1%82%D1%8B%D0%B4%D1%83%D0%BC%D0%B0%D0%BB-%D1%87%D1%82%D0%BE%D1%82%D0%BE%D0%B7%D0%B4%D0%B5%D1%81%D1%8C%D0%B1%D1%83%D0%B4%D0%B5%D1%82-%D1%87%D1%83%D0%B2%D0%B0%D0%BA%D1%82%D1%8B%D0%B4%D1%83%D0%BC%D0%B0%D0%BB%D1%87%D1%82%D0%BE%D1%82%D0%BE%D0%B7%D0%B4%D0%B5%D1%81%D1%8C%D0%B1%D1%83%D0%B4%D0%B5%D1%82-gif-22643763">чувак
            тыдумал GIF</a>from <a href="https://tenor.com/search/%D1%87%D1%83%D0%B2%D0%B0%D0%BA-gifs">чувак GIFs</a>
    </div>
    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
@else
    @foreach ($services as $service)
        <div class="card mb-3" style="max-width: 100%;" id="{{ $service->id }}">
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
            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end container-fluid pb-1">
                <button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                <form action="{{ route('service.delete', $service->id) }}" method="post" id="deleteForm">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event)"><i
                            class="bi bi-trash-fill"></i></button>
                </form>
            </div> --}}
        </div>
    @endforeach
@endif
