window.addEventListener('DOMContentLoaded', () => {
    document.body.addEventListener('click', (event) => {
        const target = event.target;

        if (target.classList.contains('js--preview-password')) {
            const controlId = target.dataset.targetId;
            const control = document.querySelector(`#${controlId}`);

            if ('password' === control.type) {
                control.type = 'text';
                target.innerHTML = target.dataset.hideLabel;
            } else {
                control.type = 'password';
                target.innerHTML = target.dataset.showLabel;
            }
        }
    });
});