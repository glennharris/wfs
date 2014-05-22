function setStyle(str, type) {
    switch (type) {
        case 0: // Normal
            str.style.border = '1px solid #000'; 
            str.style.background = 'fff';
        case 1: // Ok
            str.style.border = '1px solid #8cac5e'; 
            str.style.background = '#e5ffbf';
        case 2: // Error
            str.style.border = '1px solid #ff0000'; 
            str.style.background = '#ffcccc';
        case 3: // Blank
            str.style.border = '0';
            str.style.background = 'fff';
        default:
            str.style.border = '0';
            str.style.background = 'fff';
    }
}
