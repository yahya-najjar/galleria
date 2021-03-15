/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/admins.js ***!
  \********************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');

  var _method = $('input[name="_method"]').val();

  var passwordRequired = _method !== 'PUT';

  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        name: {
          required: true
        },
        username: {
          required: true
        },
        email: {
          required: true
        },
        password: {
          required: passwordRequired
        }
      },
      messages: {
        name: {
          required: 'please enter name'
        },
        username: {
          required: 'please enter username'
        },
        email: {
          required: 'please enter email'
        },
        password: {
          required: 'please enter password'
        }
      }
    });
  }
});
/******/ })()
;