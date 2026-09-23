(() => {
    const btn = document.querySelector('.open-btn');
    const nav = document.querySelector('.header__nav');

    if (!btn) return;

    let disabled = false;

    btn.addEventListener('click', (e) => {
        if (disabled) return;
        disabled = true;

        e.currentTarget.classList.toggle('opened');
        e.currentTarget.classList.toggle('closed');

        const isOpen = btn.classList.contains('opened');
        console.log(isOpen);

        if (isOpen) {
            nav.classList.remove('header-close');
            nav.classList.add('header-open');
        } else {
            nav.classList.add('header-close');

            setTimeout(() => nav.classList.remove('header-open'), 500);
        }

        setTimeout(() => {
            disabled = false;
        }, 500);

    });
})();