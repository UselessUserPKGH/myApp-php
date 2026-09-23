(() => {
    const rules = {
        email: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/,
        password: /^(?=.*[A-Za-z])(?=.*\d).{8,}$/
    };

    const form = document.querySelector('.form');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const confirm = document.querySelector('#confirm');

    function mark(input, message) {
        const ok = message === '';
        input.classList.toggle('valid', ok);
        input.classList.toggle('invalid', !ok);
        input.closest('.form__block').querySelector('.form__error').textContent = message;
    }

    const getEmailError = () => {
        const value = email.value.trim();
        if (value === '') return 'Введите email';
        if (!rules.email.test(value)) return 'Некорректный email';
        return '';
    };

    const getPasswordError = () => {
        const value = password.value.trim();
        if (value === '') return 'Введите пароль';
        if (!rules.password.test(value)) return 'Минимум 8 символов, нужна буква и цифра';
        return '';
    };

    const getConfirmError = () => {
        if (confirm.value === '') return 'Повторите пароль';
        if (confirm.value !== password.value) return 'Пароли не совпадают';
        return '';
    };

    email.addEventListener('input', () => mark(email, getEmailError()));

    password.addEventListener('input', () => {
        mark(password, getPasswordError());
        if (confirm.value !== '') mark(confirm, getConfirmError());
    });

    confirm.addEventListener('input', () => mark(confirm, getConfirmError()));

    form.addEventListener('submit', (e) => {
        const emailError = getEmailError();
        const passwordError = getPasswordError();
        const confirmError = getConfirmError();

        mark(email, emailError);
        mark(password, passwordError);
        mark(confirm, confirmError);

        if (emailError || passwordError || confirmError) e.preventDefault();
    });
})();