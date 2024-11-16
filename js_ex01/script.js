$(document).ready(function() {
    $('.form').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#result').html('Resultado: ' + data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Erro na requisição AJAX:', textStatus, errorThrown);
            }
        });
    });
});