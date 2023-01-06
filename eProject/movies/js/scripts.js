function guess(word) {
    var value = word;
    if (value === '') {
        $('#search_guess').hide();
    } else {
        $('#search_guess').show();
        $.post("classes/guess.php", {input: value}, function(data) {
            $("#search_guess").html(data);
        });
    }
}

function lightbox(id, value) {
    if (value == 1) {
        $.post('popup_trailer.php', {input:id}, function(data) {
            $('#light').html(data);
            $('#light').fadeIn(150);
            $('#fade').fadeIn(150);
        });
    } else {
        $('#light').fadeOut(150);
        $('#fade').fadeOut(150);
    }
}
