function showToast(type = 'info', text) {
    var toastConfig = {
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
            return; // Return early if an invalid type is provided
    }

    $.toast(Object.assign(toastConfig, { text: text }));
}
