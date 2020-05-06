

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














