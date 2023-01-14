const gi = id => document.getElementById(`${id}`)

const updateUI = data => {
    setLastMessage(data.id)

    const messages = gi('messages')

    let color = 'success'
    let position = 'start'
    let messageTitle = 'Saya'

    if (messages.dataset.role === 'dokter') {
        if (!data.is_dokter) {
            color = 'primary'
            position = 'end'
            messageTitle = data.user.name
        }
    } else {
        if (data.is_dokter === 1) {
            color = 'primary'
            position = 'end'
            messageTitle = 'Dokter'
        }
    }

    const date = new Date(data.times * 1000)
    let hours = date.getHours()
    if (hours < 10) hours = `0` + hours

    let minutes = date.getMinutes()
    if (minutes < 10) minutes = `0` + minutes

    const timeMessage = `${hours}.${minutes}`

    messages.innerHTML +=
        /* html */
        `
        <li class="list-group-item 
            list-group-item-${color} d-flex flex-column align-items-${position}">
            <span class="text-secondary" style="font-size: 12px">
                ${`${messageTitle} | ${timeMessage}`}
            </span>
            ${data.message}
        </li>
        `
}

const saveMessage = evt => {
    evt.preventDefault()
    const { target } = evt
    const { form } = target

    fetch(`${origin}/messages`, {
        method: 'POST',
        body: new FormData(form)
    })
        .then(e => e.json())
        .then(e => {
            updateUI(e)
            gi('messageTA').value = ''
        })
}

gi('send-message').addEventListener('click', saveMessage)

const setLastMessage = id => sessionStorage.setItem('lastMessage', id)

const getMessages = () => {
    const lastMessage = sessionStorage.getItem('lastMessage')

    if (!lastMessage) return

    fetch(`${origin}/new/messages/${lastMessage}`)
        .then(e => e.json())
        .then(e => {
            if (e.length > 0) e.map(message => updateUI(message))
        })
}

setInterval(getMessages, 2000)

document.addEventListener('DOMContentLoaded', () => {
    const id = document.querySelector('[data-last-message]').dataset.lastMessage
    setLastMessage(id)
})
