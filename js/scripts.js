window.addEventListener('load', function () {
    let contacts = document.querySelector('.contacts-list')
    if (contacts) {
        contacts.addEventListener('click', evt => {
            let target = evt.target
            if (target.classList && target.classList.contains('button-delete')) {
                let idContact = target.parentElement.children[2].value
                $.ajax({
                    url: '/scripts/delete_contact.php',
                    method: 'post',
                    data: {id: idContact},
                })
                contacts.removeChild(target.parentElement)
            }
        })
    }
})