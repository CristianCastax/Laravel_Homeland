$(document).ready(function() {
    $('#btnSendContactAgentMessage').click((event) =>{
        event.preventDefault(); //Esta instrucción indica que no se suba (evita el submit)
        //alert('Sending message...');
        //ajax request
        const formData = {
            "name" : $('#contact_name').val(),
            "email" : $('#contact_email').val(),
            "phone" : $('#contact_phone').val(),
            "message" : $('#contact_message').val(),
            "property_id": $('#property_id').val()
        };
        console.log(formData);

        $.ajax({
            url: "/api/contact_agent",
            type: "POST",
            data: formData,
            success: (response)=>{
                $("#formContactAgent").trigger("reset");
                $("#successAlert").removeClass("d-none")
                setTimeout(()=>{
                    $("#successAlert").addClass("d-none")
                },5000)
                //alert('Contact agent message has been sent...')
            },
            error: (errors)=>{
                console.error(errors)
            }

        })
    });


    new DataTable('#tblProperties2', {
        ajax: '/api/properties/datatables',
        type:"GET",
        success: function(response) {
            console.log("Datos recibidos:", response); // Verifica si los datos llegan correctamente
        },
        error: function(xhr) {
            console.error("Error en la solicitud:", xhr.responseText);
        },
        columns: [
            { data: 'address' },
            { data: 'price' },
            { data: 'list_type.name' },
            { data: 'offer_type' },
            { data: 'city.name' }
        ]
    });


    let table = new DataTable('#tblProperties1');

    $("#btnGetEmployeesUsingFetch").click((event)=>{
        /*fetch("http://localhost:3000/api/v1/employees/")
            .then(response=>response.json())
            .then(results=>{
                console.table(results)
            }).catch(error=>console.error(error));*/
        new DataTable('#tblEmployees1', {
            ajax: 'http://localhost:3001/api/v1/employees',
            columns: [
                {data: 'emp_number'},
                {data: 'first_name'},
                {data: 'email'},
                {data: 'gender'},
                {data: 'salary'},
                {data: 'department'}
            ]
        })
    });


    $('.js-data-example-ajax').select2({
        ajax: {
            url: 'http://localhost:3001/api/v1/departments',
            dataType: 'json'
        }
    });

    $('#mySelect2').on('select2:select', function (e) {

    });

});
