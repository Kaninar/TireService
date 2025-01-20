
let debounceTimeout;

function debounce(func, delay)
{
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(func, delay);
}

function fetchFilteredItems(page = 1)
{
    let rooms = [];
    let area_from = document.querySelector("#fromInput").value;
    let area_to = document.querySelector("#toInput").value;
    let name = document.querySelector('#name_search').value || null;
    document.querySelectorAll('.room-checkbox:checked').forEach(function (checkbox)
    {
        rooms.push(checkbox.getAttribute('data-role'));
    });
    var resultContainer = document.getElementById('results');
    var loadingSpinner = document.querySelector('#loading-spinner');

    axios.get("/filter", {
        params: {
            page: page,
            name: name,
            area_from: area_from,
            area_to: area_to,
            rooms: rooms
        },
        onDownloadProgress: function ()
        {

            //loadingSpinner.style.display = 'block';
            resultContainer.innerHTML = '';

        }
    })
        .then(response =>
        {
            //loadingSpinner.style.display = 'none';
            // resultContainer.disabled = false;
            resultContainer.innerHTML = response.data.html;

        }).catch(function (error)
        {
            console.error(error);
            document.getElementById('result').innerHTML = '<p>Произошла ошибка при загрузке данных.</p>';
        });
}
window.addEventListener("DOMContentLoaded", (event) =>
{
    document.querySelector('#image-check').addEventListener('change', function (e)
    {
        const isChecked = e.target.checked;

        debounce(() =>
        {
            fetchFilteredItems();
        }, 300);
    });
    document.querySelectorAll('.room-checkbox').forEach(function (checkbox)
    {
        checkbox.addEventListener('click', function ()
        {
            fetchFilteredItems();
        });
    });

    document.querySelector('#fromSlider').addEventListener('change', function ()
    {
        fetchFilteredItems();
    });

    document.querySelector('#toSlider').addEventListener('change', function ()
    {
        fetchFilteredItems();
    });

    fetchFilteredItems();
});