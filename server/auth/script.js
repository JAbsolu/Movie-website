document.addEventListener('DOMContentLoaded', (event) => {
    const tableList = document.querySelector('.table_list');
    let tables = document.querySelectorAll('.table-btn');
    const dynamicForm = document.querySelector('#dynamicForm');

    tables.forEach((table) => {
        table.addEventListener('click', function() {
            const tableName = table.getAttribute('data-table');
            sessionStorage.setItem('Current_table', `Manage Table: ${tableName}`);
            sessionStorage.setItem('table', `${tableName}`);
            tableList.textContent = `Manage Table: ${tableName}`;

            const address_form = document.getElementById("address_form");
            const cinema_form = document.getElementById("cinema_form");
            const customer_form = document.getElementById("customer_form");
            const food_form = document.getElementById("food_form");
            const gift_card_form = document.getElementById("gift_card_form");
            const location_form = document.getElementById("location_form");
            const merch_form = document.getElementById("merch_form");
            const movie_form = document.getElementById("movie_form");
            const movie_room_form = document.getElementById("movie_room_form");
            const role_form = document.getElementById("role_form");
            const user_form = document.getElementById("user_form");
            const employee_form = document.getElementById("employee_form");
            // get table ids
            const movie = document.getElementById("movie_table");
            const user = document.getElementById("user_table");
            const address = document.getElementById("address_table");

            let forms_map = {
                'Address' : [address_form, address],
                'Cinema' : cinema_form,
                'Customer' : customer_form,
                'Food' : food_form,
                'Gift_Card': gift_card_form,
                'Location' : location_form,
                'Merch' : merch_form,
                'Movie' : movie_form,
                'Movie_Room' : movie_room_form,
                'Role' : role_form,
                'User' : [user_form, user],
                'Employee' : employee_form
            }

            for (let item in forms_map) {
                if (item !== tableName) {
                    forms_map[item][0].classList.remove("d-block");
                    forms_map[item][0].classList.add("d-none");
                    forms_map[item][1].classList.remove("d-block");
                    forms_map[item][1].classList.add("d-none");
                } else {
                    forms_map[item][0].classList.remove("d-none");
                    forms_map[item][0].classList.add("d-block");
                    forms_map[item][1].classList.remove("d-none");
                    forms_map[item][1].classList.add("d-block");
                }
            }

            // let table_map = {
            //     'Address' : address,
            //     // 'Cinema' : cinema_form,
            //     // 'Customer' : customer_form,
            //     // 'Food' : food_form,
            //     // 'Gift_Card': gift_card_form,
            //     // 'Location' : location_form,
            //     // 'Merch' : merch_form,
            //     'Movie' : movie,
            //     // 'Movie_Room' : movie_room_form,
            //     // 'Role' : role_form,
            //     'User' : user,
            //     // 'Employee' : employee_form
            // }

            // for (let item in table_map) {
            //     if (item !== tableName) {
            //         table_map[item].classList.remove("d-block");
            //         table_map[item].classList.add("d-none");
            //     } else {
            //         table_map[item].classList.remove("d-none");
            //         table_map[item].classList.add("d-block");
            //     }
            // }

        });

    });
    // save the table name
    const currentTable = sessionStorage.getItem('table');
    const form_html = sessionStorage.getItem('form-html');

});