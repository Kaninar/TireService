function confirmDelete(event)
{
    event.preventDefault();
    if (confirm("R u sure?"))
    {
        document.querySelector("#deleteForm").submit();
        fetchFilteredItems();
    }
}