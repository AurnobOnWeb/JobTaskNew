$('.navbar-search-field').on('input', function () {
    var search = $(this).val().toLowerCase();
    var search_result_pane = $('.search-list');
    $(search_result_pane).html('');
    if (search.length == 0) {
        $('.search-list').addClass('d-none');
        return;
    }
    $('.search-list').removeClass('d-none');

    // search
    var match = $('.sidebar__menu-wrapper .nav-link').filter(function (idx, elem) {
        return $(elem).text().trim().toLowerCase().indexOf(search) >= 0 ? elem : null;
    }).sort();



    // search not found
    if (match.length == 0) {
        $(search_result_pane).append('<li class="text-muted pl-5">No search result found.</li>');
        return;
    }

    // search found
    match.each(function (idx, elem) {
        var parent = $(elem).parents('.sidebar-menu-item.sidebar-dropdown').find('.menu-title').first().text();
        if (!parent) {
            parent = `Main Menu`
        }
        parent = `<small class="d-block">${parent}</small>`
        var item_url = $(elem).attr('href') || $(elem).data('default-url');
        var item_text = $(elem).text().replace(/(\d+)/g, '').trim();
        $(search_result_pane).append(`
        <li>
          ${parent}
          <a href="${item_url}" class="fw-bold text-color--3 d-block">${item_text}</a>
        </li>
      `);
    });

});

var len = 0;
var clickLink = 0;
var search = null;
var process = false;
$('#searchInput').on('keydown', function (e) {
    var length = $('.search-list li').length;
    if (search != $(this).val() && process) {
        len = 0;
        clickLink = 0;
        $(`.search-list li:eq(${len}) a`).focus();
        $(`#searchInput`).focus();
    }
    //Down
    if (e.keyCode == 40 && length) {
        process = true;
        if (len < clickLink && clickLink < length) {
            len += 2;
        }
        $(`.search-list li[class="bg--dark"]`).removeClass('bg--dark');
        $(`.search-list li a[class="text--white"]`).removeClass('text--white');
        $(`.search-list li:eq(${len}) a`).focus().addClass('text--white');
        $(`.search-list li:eq(${len})`).addClass('bg--dark');
        $(`#searchInput`).focus();
        clickLink = len;
        if (!$(`.search-list li:eq(${clickLink}) a`).length) {
            $(`.search-list li:eq(${len})`).addClass('text--white');
        }
        len += 1;
        if (length == Math.abs(clickLink)) {
            len = 0;
        }
    }
    //Up
    else if (e.keyCode == 38 && length) {
        process = true;
        if (len > clickLink && len != 0) {
            len -= 2;
        }
        $(`.search-list li[class="bg--dark"]`).removeClass('bg--dark');
        $(`.search-list li a[class="text--white"]`).removeClass('text--white');
        $(`.search-list li:eq(${len}) a`).focus().addClass('text--white');
        $(`.search-list li:eq(${len})`).addClass('bg--dark');
        $(`#searchInput`).focus();
        clickLink = len;
        if (!$(`.search-list li:eq(${clickLink}) a`).length) {
            $(`.search-list li:eq(${len})`).addClass('text--white');
        }
        len -= 1;
        if (length == Math.abs(clickLink)) {
            len = 0;
        }
    }
    //Enter
    else if (e.keyCode == 13) {
        e.preventDefault();
        if ($(`.search-list li:eq(${clickLink}) a`).length && process) {
            $(`.search-list li:eq(${clickLink}) a`)[0].click();
        }
    }
    //Retry
    else if (e.keyCode == 8) {
        len = 0;
        clickLink = 0;
        $(`.search-list li:eq(${len}) a`).focus();
        $(`#searchInput`).focus();
    }
    search = $(this).val();
});