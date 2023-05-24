// Function to Show success Toast
function showSuccessToast(text) {
    $.toast({
        heading: 'Success',
        text: text,
        position: 'top-right',
        bgColor : '#67e198',
        icon: 'success',
        hideAfter: 3000,
        stack: 6
    })
}

// Function to show error Toast
function showErrorToast(text) {
    $.toast({
        heading: 'Error',
        text: text,
        position: 'top-right',
        bgColor : '#e66767',
        icon: 'error',
        hideAfter: 3000,
        stack: 6
    })
}

// Function to show warning Toast
function showWarningToast(text) {
    $.toast({
        heading: 'Warning',
        text: text,
        position: 'top-right',
        bgColor : '#e6c667',
        icon: 'warning',
        hideAfter: 3000,
        stack: 6
    })
}

// Function to show info Toast
function showInfoToast(text) {
    $.toast({
        heading: 'Info',
        text: text,
        position: 'top-right',
        bgColor : '#67e6c6',
        icon: 'info',
        hideAfter: 3000,
        stack: 6
    })
}
