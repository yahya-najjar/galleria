/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/users.js ***!
  \*******************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');

  var _method = $('input[name="_method"]').val();

  var passwordRequired = _method !== 'PUT';

  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        email: {
          required: true
        },
        dob: {
          required: true
        },
        password: {
          required: passwordRequired
        }
      },
      messages: {
        email: {
          required: 'please enter email'
        },
        dob: {
          required: 'please enter Date of birth'
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