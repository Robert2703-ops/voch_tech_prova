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

const allInput = document.querySelectorAll('.container-input input')

for ( let index = 0; index < allInput.length; index += 1 ) {
    allInput[index].addEventListener('blur', () => {
        if ( allInput[index].type === 'text' && allInput[index].value.length <= 3 ) {
            const divContainer = allInput[index].parentElement
            const divError = allInput[index].parentElement.parentElement.querySelector('.error-message')

            divContainer.classList.add('error')

            setTimeout(() => {
                divContainer.classList.remove('error')

            }, 100)

            allInput[index].classList.add('error')
        }

        else if ( allInput[index].type === 'number' && ( allInput[index].value <= 0 || allInput[index].value === "") ) {
            const divContainer = allInput[index].parentElement

            divContainer.classList.add('error')

            setTimeout(() => {
                divContainer.classList.remove('error')
            }, 500)

            allInput[index].classList.add('error')
        }

        else {
            allInput[index].classList.remove('error')
        }
    })
}