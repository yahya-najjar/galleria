/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/categories.js ***!
  \************************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');

  var _method = $('input[name="_method"]').val();

  var imageRequired = _method !== 'PUT';

  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        'name:en': {
          required: true
        },
        sort_order: {
          required: true
        },
        is_active: {
          required: true
        },
        image: {
          required: imageRequired
        }
      },
      messages: {
        'name:en': {
          required: 'please enter name'
        },
        sort_order: {
          required: 'please enter sort order'
        },
        is_active: {
          required: 'please select status'
        }
      }
    });
  }

  var nameAr = $('input[name="name:ar"]');
  $registerForm.on('submit', function (e) {
    if (nameAr.val() === '') {
      e.preventDefault();
      console.log('empty');
      $('#ar-tab-1').trigger('click');
      nameAr.addClass('is-invalid');
      nameAr.parent().append('<div class="invalid-feedback text-right">arabic name required</div>');
      return false;
    }
  });
});
/******/ })()
;