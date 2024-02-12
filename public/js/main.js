function showToast(type = 'info', message = 'This is a toast message!') {
    switch (type) {
        case 'success':
            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){}, // Callback after click,
                style: {
                    background: "linear-gradient(to right, #67e198, #4fbfff)"
                }
            }).showToast();
            break;
        case 'error':
            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){}, // Callback after click,
                style: {
                    background: "linear-gradient(to right, #e66767, #e6c667)"
                }
            }).showToast();
            break;
        case 'warning':
            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){}, // Callback after click,
                style: {
                    background: "linear-gradient(to right, #e6c667, #4fbfff)"
                }
            }).showToast();
            break;
        case 'info':
            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){}, // Callback after click,
                style: {
                    background: "linear-gradient(to right, #4fbfff, #67e198)"
                }
            }).showToast();
            break;
        default:
            return; // Return early if invalid types are provided
    }
}

// Share Button Click Event
function shareButtonClicked() {
    if (navigator.share) {
        navigator.share({
            title: 'Share',
            text: 'Check out this awesome website!',
            url: window.location.href
        }).then(() => {
            showToast('success', 'Successfully shared!');
        }).catch(() => {
            showToast('error', 'Failed to share!');
        });
    } else {
        showToast('error', 'Your browser does not support this feature!');
    }
}
