require('./bootstrap');

function showToasts() {
    let toasts = document.querySelectorAll('[data-bs-toggle="toast"]')
    for (let i = 0; i < toasts.length; i++) {
        let el = toasts[i]
        el.addEventListener('hidden.bs.toast', e => {
            e.target.remove()
        })
        let toast = bootstrap.Toast.getOrCreateInstance(toasts[i])
        toast.show()
    }
}
showToasts()

let tabId = document.location.hash
if (tabId) {
    let tabEl = document.getElementById(tabId.replace('#', ''))
    if (tabEl) {
        const bsTab = new bootstrap.Tab(tabId)
        bsTab.show()
    }
}

function flash(message, type = 'success') {
    let flashHtml = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-toggle="toast" data-bs-config=\'{"autohide": true, "delay": 5000}\'>' +
        '        <div class="toast-body bg-$type text-white rounded bg-opacity-75">' +
        '            $message' +
        '        </div>' +
        '    </div>'

    let toastContainer = document.getElementById('toast-container')
    toastContainer.innerHTML += flashHtml.replace('$message', message)
        .replace('$type', type)
    showToasts()
}
window.flash = flash
