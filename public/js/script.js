$(document).ready(function () {

    function checkString (str, patt) {
        let res = str.match(patt);
        return (res);
    }

    function fadeInOut (mess, timeout) {
        $('.error-message-p').html(mess);
        $('.error-message').fadeIn();
        setTimeout(function(){
            $('.error-message').fadeOut();
            $('error-message-p').html('');
        }, timeout);
        return $.Deferred().resolve();
    }

    function addRemoveError(selector, timeout) {
        $(selector).parent().addClass('has-error');
        setTimeout(function(){
            $(selector).parent().removeClass('has-error');
        }, timeout);
    }

    const timeout = 3000;

    $('#compress').on('click', function (e) {
        e.preventDefault();

        let patt = /[^a-f]/g;
        let str = $('#decompressed-1').val();
        let passed = checkString(str, patt);


        if (!passed && str !== '' && str.length > 2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: compress,
                type: 'POST',
                data: {
                    message:str
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status === 'success') {
                        $('#compressed-1').val(data.msg);
                    } else {
                        fadeInOut(data.msg, timeout);
                    }

                }
            });
        } else if (str.length === 2) {
            $('#compressed-2').val(str);
            $('#compressed-1').val(str);
        } else {
            fadeInOut('Only Letters a-f are allowed!', timeout);
            addRemoveError('#decompressed-1', timeout);
        }
    });

    $('#decompress').on('click', function (e) {
        e.preventDefault();

        let patt = /[^a-f0-9]/g;
        let str = $('#compressed-2').val();
        let passed = checkString(str, patt);

        if (!passed && str !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: decompress,
                type: 'POST',
                data: {
                    message:str
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status === 'success') {
                        $('#decompressed-2').val(data.msg);
                    } else {
                        fadeInOut(data.msg, timeout);
                    }
                }
            });
        } else if (str.length === 2) {
            $('#decompressed-2').val(str);
        } else {
            fadeInOut('Only Letters a-f and numbers 1-9 are allowed!', timeout);
            addRemoveError('#compressed-2', timeout);
        }
    });
});
