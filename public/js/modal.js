function ShowModal( ) {
    const modaContainer = document.querySelector('div.modal-create-person')
    const formContainer = document.querySelector('div.form-content-container')

    modaContainer.classList.add('show')
    formContainer.classList.add('show')

    setTimeout(() => {
        formContainer.classList.remove('show')
    }, 500);

    modaContainer.addEventListener('click', (event) => {
        if ( event.target.id == modaContainer.id || event.target.className == "close-modal" || event.target.className === "fas fa-times" ) {
            modaContainer.classList.remove('show')
        }
    })
}