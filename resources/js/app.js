window.Vue = require('vue');

$('document').ready(function() {
    $('.select2').select2();
    $('.dropify').dropify();
    autoComplete();
    // clearInterval(interval);
})

function clickLinkConfirm(element, message) {
    Swal.fire({
        title: "Confirm!",
        text: message,
        icon: "warning",
        buttonsStyling: false,
        confirmButtonText: "<i class='la la-thumbs-o-up'></i> Yes delete it!",
        showCancelButton: true,
        cancelButtonText: "<i class='la la-thumbs-down'></i> No, thanks",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-default"
        }
    }).then(function(result) {
        if (result.value) {
            $(element).find('form').submit();
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Your item is safe :)",
                "error"
            )
        }
    });
}

$('.deleteRow').click(function(e) {
    console.log('delete');
    clickLinkConfirm(this, "Are you sure you want to delete this item?");
    e.preventDefault();
});

$('input[name="type"]').on('change', function() {
    let selectedItem = 'settings_' + $(this).val();
    $('.settings_text').slideUp();
    $('.settings_text_area').slideUp();
    $('.settings_rich_text_box').slideUp();
    $('.settings_number').slideUp();
    $('.settings_image').slideUp();
    $('.settings_album').slideUp();
    $('.settings_checkbox').slideUp();
    $('.settings_select').slideUp();
    $('.' + selectedItem).slideDown();
});

function autoComplete() {
    let url, name;
    let element = $('.ajax-auto-complete');
    url = element.attr('url');
    name = element.attr('name');

    element.select2({
        placeholder: "search for " + name,
        ajax: {
            url: url,
            dataType: 'json',
            data: function(params) {
                // Query parameters will be ?search=[term]
                return {
                    search: params.term,
                };
            }
        },
        minimumInputLength: 1,
    });
}
