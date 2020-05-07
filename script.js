

$('#addButton').on('click', function () {

    let add = $('input.add').val();


    $.ajax({
        method: "POST",
        url: "config.php",
        data: {text: add},
        dataType: 'html',
        beforeSend: function() {
            $('#addButton').prop('disabled', true);
        },
        success: function(data) {
            if (data === false) {
                alert('Error');
            } else {
                $('#addButton').prop('disabled', false);
                $('#error').text('Success');
            }
        }
    });
    $('input.add').val(''); //очищаем значение поля
});

// -------------------------------------------


$('button').on('click', function () {
    let one = $('input.one:checked').val();
    let two = $('input.two:checked').val();
    let three = $('input.three:checked').val();
    let name = $('input.name').val().trim();
    let mail = $('input.mail').val().trim();

    if (mail === "") {
        $('#error').text('Enter email');
        return false;
    } else if (name === "") {
        $('#error').text('Enter name');
        return false;
    } else if ($('input.one').is(':checked') === false) {
        $('#error').text('Select answer1');
        return false;
    } else if ($('input.two').is(':checked') === false) {
        $('#error').text('Select answer2');
        return false;
    } else if ($('input.three').is(':checked') === false) {
        $('#error').text('Select answer3');
        return false;
    }

    $('#error').text(''); //очищаем error
    $('input.one').prop('checked', false); //очищаем выбор
    $('input.two').prop('checked', false); //очищаем выбор
    $('input.three').prop('checked', false); //очищаем выбор

    $.ajax({
        method: "POST",
        url: "handler.php",
        data: {one: one, two: two, three: three, name: name, mail: mail},
        dataType: 'html',
        beforeSend: function() {
            $('button').prop('disabled', true);
        },
        success: function(data) {
            if (data === false) {
                alert('Error');
            } else {
                $('button').prop('disabled', false);
                $('#error').text('Success');
            }
        }
    });
    $('input.name').val(''); //очищаем значение поля
    $('input.mail').val(''); //очищаем значение поля
});















