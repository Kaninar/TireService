let imageCheck, fromSlider, fromInput, toSlider, toInput, nameSearch;
const sessionlStorage = window.sessionStorage;

sessionlStorage.setItem('page', JSON.stringify(1));

function getFromStorage(var_name)
{
    return JSON.parse(sessionlStorage.getItem(var_name));
}

window.addEventListener("DOMContentLoaded", (event) =>
{
    imageCheck = document.querySelector("#image-check");
    fromSlider = document.querySelector('#fromSlider');
    fromInput = document.querySelector('#fromInput');
    toSlider = document.querySelector('#toSlider');
    toInput = document.querySelector('#toInput');
    nameSearch = document.querySelector('#name_search');

    imageCheck.addEventListener('change', function ()
    {
        window.sessionStorage.setItem('image', JSON.stringify(imageCheck.checked));

        debounce(() =>
        {
            fetchFilteredItems();
        }, 300);
    });

    nameSearch.addEventListener("input", function (event)
    {
        sessionlStorage.setItem('name', JSON.stringify(nameSearch.value));

        fetchFilteredItems();
    });

    document.querySelectorAll('.room-checkbox').forEach(function (checkbox)
    {
        checkbox.addEventListener('change', function ()
        {
            if (!window.sessionStorage.getItem('rooms'))
            {
                let rooms = [];
                window.sessionStorage.setItem('rooms', JSON.stringify(rooms));
            }

            rooms = JSON.parse(window.sessionStorage.getItem('rooms'));

            let data = checkbox.getAttribute('data-role');
            let index = rooms.indexOf(data);

            if (checkbox.checked)
            {
                if (index == -1)
                {
                    rooms.push(data);
                }
            }
            else
            {
                if (index > -1)
                {
                    rooms.splice(index, 1);
                }
            }
            sessionStorage.setItem('rooms', JSON.stringify(rooms));

            debounce(() =>
            {
                fetchFilteredItems();
            }, 300);
        });


    });

    fromInput.addEventListener('change', function ()
    {
        window.sessionStorage.setItem('area_from', JSON.stringify(fromInput.value));

        fetchFilteredItems();
    });
    fromSlider.addEventListener('change', function ()
    {
        window.sessionStorage.setItem('area_from', JSON.stringify(fromSlider.value));

        fetchFilteredItems();
    });

    toInput.addEventListener('change', function ()
    {
        window.sessionStorage.setItem('area_to', JSON.stringify(toInput.value));

        fetchFilteredItems();
    });
    toSlider.addEventListener('change', function ()
    {
        window.sessionStorage.setItem('area_to', JSON.stringify(toSlider.value));

        fetchFilteredItems();
    });

    document.addEventListener('click', function (event)
    {
        if (event.target.classList.contains('page-link'))
        {
            event.preventDefault();
            const url = event.target.href;
            const pageParam = new URL(url).searchParams.get('page') ?? 1;

            if (pageParam)
            {
                sessionStorage.setItem('page', pageParam);
            }


            fetchFilteredItems();
        }
    });

    if (pageAccessedByReload)
    {
        loadSavedFilters();
        fetchFilteredItems();
    }
});

const pageAccessedByReload = (
    (window.performance.navigation && window.performance.navigation.type === 1) ||
    window.performance
        .getEntriesByType('navigation')
        .map((nav) => nav.type)
        .includes('reload')
);

function loadSavedFilters()
{
    imageCheck.checked = getFromStorage('image');

    // fromSlider.value = parseFloat(getFromStorage('from_area'));
    // fromInput.value = getFromStorage('from_area');
    // toSlider.value = getFromStorage('to_area');
    // toInput.value = getFromStorage('to_area');

    nameSearch.value = getFromStorage('name');

    let rooms = getFromStorage('rooms');

    document.querySelectorAll('.room-checkbox').forEach(function (checkbox)
    {
        let data = checkbox.getAttribute('data-role');
        let index = rooms.indexOf(data);

        if (index > -1)
            checkbox.checked = true;
    });
}

