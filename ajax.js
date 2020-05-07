$('#submit').on('click', function () {

    let name = $('input#name:checked').val();

    $.ajax({
        method: "POST",
        url: "sort.php",
        data: {name: name},
        dataType: 'html',
    });
});