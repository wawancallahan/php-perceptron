'use strict'

$('#btn-testing').on('click', function (e) {
    e.preventDefault();

    $('#output').html('');

    let vector = $('#form-vector').serializeArray();
    let max_iteration = $('#max_iteration').val();
    let theta = $('#theta').val();
    
    $.ajax({
        url: 'process_testing.php',
        type: 'POST',
        dataType: 'json',
        data: {
            vector: vector,
            max_iteration: max_iteration,
            theta: theta
        }
    }).then(function (response) {
        $('#output').html(response.pesan);
    }).catch(function (response) {
        console.log(response);
    });
});