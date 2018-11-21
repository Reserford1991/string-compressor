$(document).ready(function () {
    console.log("ready!");


    $('#compress').on('click', function (e) {
        e.preventDefault();

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        //     }
        // });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /* the route pointing to the post function */
            url: compress,
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {
                message:'test'
            },
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {
                console.log(data.msg);
            }
        });
    });

    $('#decompress').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /* the route pointing to the post function */
            url: decompress,
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {
                message:'test'
            },
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {
                console.log(data.msg);
            }
        });

    });
});
