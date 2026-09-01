// Cenius CRM — minimal client-side enhancements
// Auto-dismiss flash messages after 4 seconds
document.addEventListener('DOMContentLoaded', function () {
    var flash = document.querySelector('.flash');
    if (flash) {
        setTimeout(function () {
            flash.style.transition = 'opacity 300ms ease';
            flash.style.opacity = '0';
            setTimeout(function () { flash.remove(); }, 300);
        }, 4000);
    }
});
