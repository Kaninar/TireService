let debounceTimeout;

function debounce(func, delay)
{
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(func, delay);
}

function getFilters()
{
    const filters = {
        area_from: document.querySelector('#fromSlider').value,
        area_to: document.querySelector('#toSlider').value,
        page: getFromStorage('page'),
        rooms: []
    };

    document.querySelectorAll('.room-checkbox:checked').forEach(function (checkbox)
    {
        filters.rooms.push(checkbox.getAttribute('data-role'));
    });

    if (document.querySelector("#image-check").isChecked)
    {
        filters['image'] = true;
    }

    var name = document.querySelector('#name_search').value.trim();
    if (name != '')
    {
        filters["name"] = name;
    }

    return filters;
};

function fetchFilteredItems()
{
    const filters = getFilters();
    const params = new URLSearchParams(filters);

    if (filters.rooms.length > 0)
    {
        filters.rooms.forEach(check =>
        {
            params.append('rooms[]', check);
            params.delete('rooms');
        });
    }

    var resultContainer = document.getElementById('results');

    axios.get("/filter?" + params.toString())
        .then(response =>
        {
            resultContainer.innerHTML = response.data.html;
            document.querySelector("#pages").innerHTML = response.data.pagination;
        }).catch(function (error)
        {
            console.error(error);
            document.getElementById('result').innerHTML = '<p>Произошла ошибка при загрузке данных.</p>';
        });

    window.history.replaceState(null, null, '?' + params.toString());
}

