// Class definition
var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('.kt_repeater').repeater({
            initEmpty: true,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    let demo2 = function() {
        $('.kt_repeater_edit').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});
