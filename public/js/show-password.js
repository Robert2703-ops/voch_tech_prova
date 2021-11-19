// show password
const eyeButtons = document.querySelectorAll('.password-container button')

eyeButtons.forEach(button => {
    button.addEventListener('click', () => {
        let input = button.parentElement.querySelector('input')
        // let divContainer = button.parentElement

        let newButton = document.createElement('button')
        newButton.type = 'button'
        let eyeSlash = document.createElement('a')
        eyeSlash.setAttribute('class', 'fas fa-eye-slash')

        newButton.appendChild(eyeSlash)

        input.type = 'text'
        button.parentElement.querySelector('button').replaceWith(newButton)

        newButton.addEventListener('click', () => {
            input.type = 'password'
            newButton.parentElement.querySelector('button').replaceWith(button)
        })
    })
})

// check input fields
const inputs = document.querySelectorAll('.input-container input')
const submitButton = document.querySelector('.submit-button button')

inputs.forEach(input => {
    input.addEventListener('blur', () => {
        let divErrors = input.parentElement.parentElement.querySelector('.error-message')
        let divErrorPassword = input.parentElement.parentElement.parentElement.querySelector('.error-message')

        if ( input.value.length <= 0 ) {
            if ( input.type === 'text' || input.type === 'email' ) {
                divErrors.innerHTML = `<p>This field can´t be <strong>EMPTY</strong>, please, fill it!</p>`
                divErrors.classList.add('show')
            }
            else if ( input.type === 'password' ) {
                divErrorPassword.innerHTML = `<p>This field can´t be <strong>EMPTY</strong>, please, fill it!</p>`
                divErrorPassword.classList.add('show')
            }
        }

        else if ( (input.type === 'text' || input.type === 'email') && input.value.length <= 4 ) {
            divErrors.innerHTML = `<p>This field nedd at least <strong>4 CHARACTERS</strong> </p>`
            divErrors.classList.add('show')
        }

        else if ( input.type === 'password' && input.value.length  <= 5 ) {
            divErrorPassword.innerHTML = `<p>This field nedd at least <strong>6 CHARACTERS</strong> </p>`
            divErrorPassword.classList.add('show')
        }

        else {
            if ( input.type === 'text' || input.type === 'email' ) {
                divErrors.classList.remove('show')

                checkFields( inputs )
            }
            else if ( input.type === 'password' ) {
                divErrorPassword.classList.remove('show')
                checkFields( inputs, submitButton )
            }
        }
    })
})

function checkFields( inputList, submitButton ) {
    let inputsChecked = []

    for ( let index = 0; index < inputList.length; index += 1 ) {
        if ( (inputList[index].type === 'text' || inputList[index].type === 'email') && inputList[index].value.length >= 6 ) {
            inputsChecked.push( inputList[index] )
        }
        else if ( inputList[index].type === 'password' && inputList[index].value.length >= 6) { 
            inputsChecked.push( inputList[index] )
        }    
        
    }

    if ( inputsChecked.length === inputList.length ) {
        //console.log( submitButton.disabled )  
        //submitButton.disabled = false
        document.querySelector('.submit-button button').disabled = false
    }
}