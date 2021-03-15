jQuery(document).ready(function() {
    let $registerForm = $('#sheen_value_form');
    let _method = $('input[name="_method"]').val();
    let passwordRequired = _method !== 'PUT';
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
