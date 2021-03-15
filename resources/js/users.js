jQuery(document).ready(function() {
    let $registerForm = $('#sheen_value_form');
    let _method = $('input[name="_method"]').val();
    let passwordRequired = _method !== 'PUT';
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
