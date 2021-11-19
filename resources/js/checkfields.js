const allInput = document.querySelectorAll('.container-input input')

for ( let index = 0; index < allInput.length; index += 1 ) {
    allInput[index].addEventListener('blur', () => {
        if ( allInput[index].type === 'text' && allInput[index].value.length <= 3 ) {
            const divContainer = allInput[index].parentElement

            divContainer.classList.add('error')

            setTimeout(() => {
                divContainer.classList.remove('error')
            }, 500)
        }

        else if ( allInput[index].type === 'password' && allInput[index].value.length <= 3) {
            const divContainer = allInput[index].parentElement

            setTimeout(() => {
                divContainer.classList.remove('error')
            }, 500)
        }
    })
}