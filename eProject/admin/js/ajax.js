var value;
var sel;
function getNewsSearchResults() {
    value = $('input[name=news_search_input]').val();
    sel = $('select[name=news_search_select]').val();
    $.post("classes/admin_news_search.php", {input: value, select: sel}, function(data) {
        $("#news_search_results").html(data);
    });
}
function getCommentsSearchResults() {
    value = $('input[name=comments_search_input]').val();
    sel = $('select[name=comments_search_select]').val();
    $.post("classes/admin_comments_search.php", {input: value, select: sel}, function(data) {
        $("#comments_search_results").html(data);
    });
}
function getMusicsSearchResults() {
    value = $('input[name=musics_search_input]').val();
    sel = $('select[name=musics_search_select]').val();
    $.post("classes/admin_musics_search.php", {input: value, select: sel}, function(data) {
        $("#musics_search_results").html(data);
    });
}
function getArtistsSearchResults() {
    value = $('input[name=artists_search_input]').val();
    sel = $('select[name=artists_search_select]').val();
    $.post("classes/admin_artists_search.php", {input: value, select: sel}, function(data) {
        $("#artists_search_results").html(data);
    });
}
function getAlbumsSearchResults() {
    value = $('input[name=albums_search_input]').val();
    sel = $('select[name=albums_search_select]').val();
    $.post("classes/admin_albums_search.php", {input: value, select: sel}, function(data) {
        $("#albums_search_results").html(data);
    });
}
function getBooksSearchResults() {
    value = $('input[name=books_search_input]').val();
    sel = $('select[name=books_search_select]').val();
    $.post("classes/admin_books_search.php", {input: value, select: sel}, function(data) {
        $("#books_search_results").html(data);
    });
}
function getAuthorsSearchResults() {
    value = $('input[name=authors_search_input]').val();
    sel = $('select[name=authors_search_select]').val();
    $.post("classes/admin_authors_search.php", {input: value, select: sel}, function(data) {
        $("#authors_search_results").html(data);
    });
}
function getTweetsSearchResults() {
    value = $('input[name=tweets_search_input]').val();
    sel = $('select[name=tweets_search_select]').val();
    $.post("classes/admin_tweets_search.php", {input: value, select: sel}, function(data) {
        $("#tweets_search_results").html(data);
    });
}
function getAccountsSearchResults() {
    value = $('input[name=accounts_search_input]').val();
    sel = $('select[name=accounts_search_select]').val();
    $.post("classes/admin_accounts_search.php", {input: value, select: sel}, function(data) {
        $("#accounts_search_results").html(data);
    });
}
function getTracksSearchResults() {
    value = $('input[name=tracks_search_input]').val();
    sel = $('select[name=tracks_search_select]').val();
    $.post("classes/admin_tracks_search.php", {input: value, select: sel}, function(data) {
        $("#tracks_search_results").html(data);
    });
}
function getMoviesSearchResults() {
    value = $('input[name=movies_search_input]').val();
    sel = $('select[name=movies_search_select]').val();
    $.post("classes/admin_movies_search.php", {input: value, select: sel}, function(data) {
        $("#movies_search_results").html(data);
    });
}
function getShortsSearchResults() {
    value = $('input[name=shorts_search_input]').val();
    sel = $('select[name=shorts_search_select]').val();
    $.post("classes/admin_shorts_search.php", {input: value, select: sel}, function(data) {
        $("#shorts_search_results").html(data);
    });
}
function editCancel(input) {
    switch (input) {
        case 0:
            document.getElementById('accounts_edit').innerHTML = '';
            break;
        case 10:
            document.getElementById('musics_edit').innerHTML = '';
            break;
        case 11:
            document.getElementById('artists_edit').innerHTML = '';
            break;
        case 12:
            document.getElementById('albums_edit').innerHTML = '';
            break;
	case 20:
            document.getElementById('movies_edit').innerHTML = '';
            break;
	case 21:
            document.getElementById('shorts_edit').innerHTML = '';
            break;
        case 30:
            document.getElementById('books_edit').innerHTML = '';
            break;
        case 31:
            document.getElementById('authors_edit').innerHTML = '';
            break;
        case 50:
            document.getElementById('news_edit').innerHTML = '';
            break;
    }
}
function showTab(input) {
    var tab = document.getElementsByClassName('admin_tabs');
    var limit = tab.length;
    for (var loop = 0; loop <= limit; loop++) {
        if (loop === input) {
            tab[loop].style.display = 'block';
        } else {
            tab[loop].style.display = 'none';
        }
    }
}
function switchTab(input) {
    window.location.href = 'http://www.eden.com/admin/index.php?switchTab=' + input;
}
function switchPanel(input1, input2) {
    window.location.href = 'http://www.eden.com/admin/index.php?switchTab=' + input1 + '&switchPanel=' + input2;
}
function logout(user_id) {
    $.post("classes/logout.php", {user_id: user_id}, function(data) {
        window.location.href = 'http://www.eden.com/intro.php';
    });
}

function deleteAction(value, value2) {
        $.post("classes/admin_action_delete.php", {id: value, num: value2});
        location.reload();
    }
    function editAction(value, value2) {
        if (value2 === 0) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#accounts_edit").html(data);
            });
        } else
        if (value2 === 1) {
        } else
        if (value2 === 10) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#musics_edit").html(data);
            });
        } else
        if (value2 === 11) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#artists_edit").html(data);
            });
        } else
        if (value2 === 12) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#albums_edit").html(data);
            });
        } else
	if (value2 === 20) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#movies_edit").html(data);
            });
        } else
	if (value2 === 21) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#shorts_edit").html(data);
            });
        } else
        if (value2 === 30) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#books_edit").html(data);
            });
        } else
        if (value2 === 31) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#authors_edit").html(data);
            });
        } else
        if (value2 === 50) {
            $.post("classes/admin_action_edit.php", {id: value, table: value2}, function(data) {
                $("#news_edit").html(data);
            });
        }
    }
    function addAction(value2) {
        if (value2 === 0) {
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#accounts_edit").html(data);
            });
        } else 
        if (value2 === 1) { 
            
        } else 
        if (value2 === 10) { 
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#musics_edit").html(data);
            });
        } else 
        if (value2 === 11) {  
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#artists_edit").html(data);
            });
        } else 
        if (value2 === 12) {  
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#albums_edit").html(data);
            });
        } else 
	if (value2 === 20) {  
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#movies_edit").html(data);
            });
        } else 
	if (value2 === 21) {
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#movies_edit").html(data);
            });
        } else 
        if (value2 === 30) {  
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#books_edit").html(data);
            });
        } else 
        if (value2 === 31) {  
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#authors_edit").html(data);
            });
        } else 
        if (value2 === 50) {
            $.post("classes/admin_action_add.php", {table: value2}, function(data) {
                $("#news_edit").html(data);
            });
        }
    }
