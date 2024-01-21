function showToast(type = 'info', text) {
    let toastConfig = {
        position: 'top-right',
        hideAfter: 3000,
        stack: 6
    };

    switch (type) {
        case 'success':
            toastConfig.heading = 'Success';
            toastConfig.bgColor = '#67e198';
            toastConfig.icon = 'success';
            break;
        case 'error':
            toastConfig.heading = 'Error';
            toastConfig.bgColor = '#e66767';
            toastConfig.icon = 'error';
            break;
        case 'warning':
            toastConfig.heading = 'Warning';
            toastConfig.bgColor = '#e6c667';
            toastConfig.icon = 'warning';
            break;
        case 'info':
            toastConfig.heading = 'Info';
            toastConfig.bgColor = '#4fbfff';
            toastConfig.icon = 'info';
            break;
        default:
            return; // Return early if invalid types are provided
    }

    $.toast(Object.assign(toastConfig, { text: text }));
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
