import './bootstrap';
import 'laravel-datatables-vite';
import {
    Datatable,
    initTE,
} from "tw-elements";

initTE({Datatable});

const customDatatable = document.getElementsByClassName("datatable");

for (let i = customDatatable.length - 1; i >= 0; i--) {
    const settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://127.0.0.1:8000/api/ajax/get-all?table=company",
        "method": "GET",
        "headers": {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
    };
    let columns = [];
    let data = [];
    $.ajax(settings).done(function (response) {
        console.log(response);
        columns = response.columns;
        data = response.data;
    });
    new Datatable(
        customDatatable[i],
        {
            columns: columns,
            rows: data,
            pagination: true,
            search: true,
        },
        {hover: true}
    );
}


