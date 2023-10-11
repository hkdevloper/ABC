import './bootstrap';
import 'laravel-datatables-vite';
import {Datatable, initTE,} from "tw-elements";

initTE({Datatable});
const customDatatables = document.querySelectorAll(".datatable");

customDatatables.forEach((datatable) => {
    // Get the data attribute value from each element
    const table = datatable.getAttribute("data-table");

    if (!table) {
        return;
    }

    // Define the AJAX settings
    const settings = {
        async: true,
        crossDomain: true,
        url: `http://127.0.0.1:8000/api/ajax/get-all?table=${table}`,
        method: "GET",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
    };

    // Initialize columns and data
    let columns = [];
    let data = [];

    // Perform the AJAX request
    $.ajax(settings)
        .done(function (response) {
            // console.log(response);
            columns = response.columns;
            data = response.data;

            // Create a new DataTable
            new Datatable(datatable, {
                columns: columns,
                rows: data,
                pagination: true,
                search: true,
            });
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error(`AJAX Request Failed: ${textStatus}, ${errorThrown}`);
        });
});


