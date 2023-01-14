const gi = id => document.getElementById(`${id}`)

const updateUI = data => {
    setLastMessage(data.id)

    const messages = gi('messages')
    const itsMe = parseInt(messages.dataset.userId) === parseInt(data.user_id)

    const date = new Date(data.times * 1000)
    let hours = date.getHours()
    if (hours < 10) hours = `0` + hours

    let minutes = date.getMinutes()
    if (minutes < 10) minutes = `0` + minutes

    const timeMessage = `${hours}.${minutes}`

    let userInfo = itsMe ? 'Saya' : data.user.name

    if (parseInt(data.is_dokter) === 1) {
        userInfo = itsMe ? 'Saya' : `Dokter :  ${data.user.name}`
    }

    messages.innerHTML +=
        /* html */
        `
        <li class="list-group-item 
        list-group-item-${itsMe ? 'success' : 'primary'}
        d-flex flex-column
        align-items-${itsMe ? 'start' : 'end'}">
            <span class="text-secondary" style="font-size: 12px">
                ${userInfo} | ${timeMessage}
            </span>

            ${data.message}
        </li >
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
        .then(e => updateUI(e))
}

gi('send-message').addEventListener('click', saveMessage)

const setLastMessage = id => {
    const lastMessage = id ?? document.querySelector('[data-last-message]').dataset.lastMessage

    sessionStorage.setItem('lastMessage', lastMessage)
}

const getMessages = () => {
    const lastMessage = sessionStorage.getItem('lastMessage')

    fetch(`${origin}/new/messages/${lastMessage}`)
        .then(e => e.json())
        .then(e => {
            if (e.length > 0) e.map(message => updateUI(message))
        })
}

setInterval(getMessages, 2000)

document.addEventListener('DOMContentLoaded', () => setLastMessage())
