const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        const hasConfirmed = confirm('Vuoi confermare l\'eliminazione del post?');
        if (hasConfirmed) form.submit();
    })
})