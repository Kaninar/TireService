<head>
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" placeholder="name">
            </div>
            <div class="mb-3">
                <label for="imageURL" class="form-label">URL картинки</label>
                <input type="url" class="form-control" id="imageURL" placeholder="htttp://example/image.jpg">
            </div>
            <div class="mb-3">
                <label for="rooms" class="form-label">Количество комнат</label>
                <input type="number" class="form-control" id="rooms" placeholder="9">
            </div>
            <div class="mb-3">
                <label for="floors" class="form-label">Количество этажей</label>
                <input type="number" class="form-control" id="floors" placeholder="6">
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Площадь (м²)</label>
                <input type="number" class="form-control" id="area" placeholder="10.11">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
