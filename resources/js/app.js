import './bootstrap';
import { Datepicker, Tab, Datatable, initTE } from "tw-elements";

// Initiate all components at once
initTE({ Datepicker, Tab, Datatable });

const customDatatable = document.getElementById("datatable");

const setActions = () => {
    document.querySelectorAll(".call-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            console.log(`call ${btn.attributes["data-te-number"].value}`);
        });
    });

    document.querySelectorAll(".message-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            console.log(
                `send a message to ${btn.attributes["data-te-email"].value}`
            );
        });
    });
};

customDatatable.addEventListener("render.te.datatable", setActions);

new Datatable(
    customDatatable,
    {
        columns: [
            { label: "Name", field: "name" },
            { label: "Position", field: "position" },
            { label: "Office", field: "office" },
            { label: "Contact", field: "contact", sort: false },
        ],
        rows: [
            {
                name: "Tiger Nixon",
                position: "System Architect",
                office: "Edinburgh",
                phone: "+48000000000",
                email: "tiger.nixon@gmail.com",
            },
            {
                name: "Sonya Frost",
                position: "Software Engineer",
                office: "Edinburgh",
                phone: "+53456123456",
                email: "sfrost@gmail.com",
            },
            {
                name: "Tatyana Fitzpatrick",
                position: "Regional Director",
                office: "London",
                phone: "+42123432456",
                email: "tfitz@gmail.com",
            },
        ].map((row) => {
            return {
                ...row,
                contact: `
            <button
              type="button"
              data-te-ripple-init
              data-te-ripple-color="dark"
              data-te-number=${row.phone}
              class="call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#3B71CA" viewBox="0 0 24 24" stroke-width="1.3" stroke="#3B71CA" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
            </button>
            <button
              type="button"
              data-te-ripple-init
              data-te-ripple-color="light"
              data-te-email=${row.email}
              class="message-btn inline-block rounded-full border border-primary bg-primary text-white p-1.5 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B71CA" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </button>`,
            };
        }),
    },
    { hover: true }
);
