// $(document).ready(function () {
//     $('#submit').on('click', function () {
//         let name = $('input#name:checked').val();
//
//         console.log(name);
//     })
// })
// ---------------------
// $(document).ready(function () {
//
//     if ($('input#name').is(":checked")) {
//             let name = $('input#name:checked').val();
//             console.log(name);
//     }
// })
// --------------------------
$(document).ready(function(){
    $('#submit').click(function(){
        var name = [];
        $('#name').each(function(){
            if($(this).is(":checked"))
            {
                name.push($(this).val());
            }
        });
        name = name.toString();
        $.ajax({
            url:"sort.php",
            method:"POST",
            data:{name:name},
            success:function(data){
                $('#result').html(data);
            }
        });
    });
});

