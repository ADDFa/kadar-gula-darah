document.addEventListener('DOMContentLoaded', () => {
    const active = document.querySelector(`[href="${location.pathname}"]`)
    if (active) active.classList.add('active')
})