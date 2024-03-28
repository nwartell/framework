document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('password');
    //var strengthMeter = document.getElementById('strength-meter');
    //var strengthText = document.getElementById('strength-text');

    var icoMin = document.getElementById('ico-min');
    var icoUpp = document.getElementById('ico-upp');
    var icoNum = document.getElementById('ico-num');
    var icoSpe = document.getElementById('ico-spe');

    var xicon = 'bi-x-circle';
    var checkicon = 'bi-check-circle'

    function removeChecks() {
        icoMin.classList.remove(checkicon);
        icoMin.classList.add(xicon);

        icoUpp.classList.remove(checkicon);
        icoUpp.classList.add(xicon);

        icoNum.classList.remove(checkicon);
        icoNum.classList.add(xicon);

        icoSpe.classList.remove(checkicon);
        icoSpe.classList.add(xicon);
    }

    passwordInput.addEventListener('input', function () {
        var password = passwordInput.value;
        var strength = 0;

        // Check length and proceed with strength addition
        if (password.length > 0 && password.length < 8) {

            strength = 1;
            removeChecks();

            // Uppercase characters
            if (/[A-Z]/.test(password)) {
                icoUpp.classList.remove(xicon);
                icoUpp.classList.add(checkicon);
            }

            // Number
            if (/\d/.test(password)) {
                icoNum.classList.remove(xicon);
                icoNum.classList.add(checkicon);

            }

            // Special character
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                icoSpe.classList.remove(xicon);
                icoSpe.classList.add(checkicon);
            }

        } else if (password.length >= 8) {
            strength = password.length;
            
            icoMin.classList.remove(xicon);
            icoMin.classList.add(checkicon);

            // Uppercase characters
            if (/[A-Z]/.test(password)) {
                strength += 1;
                icoUpp.classList.remove(xicon);
                icoUpp.classList.add(checkicon);
            }

            // Number
            if (/\d/.test(password)) {
                strength += 1;
                icoNum.classList.remove(xicon);
                icoNum.classList.add(checkicon);

            }

            // Special character
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 1;
                icoSpe.classList.remove(xicon);
                icoSpe.classList.add(checkicon);
            }

        } else {
            strength = 0;
            removeChecks();
        }

        /*strengthMeter.value = strength;
        switch (strength) {
            case 0:
                strengthText.textContent = '';
                break;
            case 1:
                strengthText.textContent = 'Very weak';
                break;
            case 10:
                strengthText.textContent = 'Weak password';
                break;
            case 15:
                strengthText.textContent = 'Strong password';
                break;
            case 20:
                strengthText.textContent = 'Very strong';
                break;
        }*/
    });
});