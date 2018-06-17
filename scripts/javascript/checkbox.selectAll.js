// Toggle all checkboxes
function toggle(source) {
    checkboxes = document.getElementsByName('select-all[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}
