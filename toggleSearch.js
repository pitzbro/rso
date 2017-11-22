function toggleSearch() {
    var searchBlock = document.getElementById('block-views-exp-search-page');
    var searchInput = document.getElementById('edit-combine');
    searchBlock.classList.toggle('opened');
    if (searchBlock.classList.contains('opened')) {

        var changeFocus = setTimeout(setFocus, 3000);

        function setFocus() {
            console.log('setting focus!');
            searchInput.focus();
        }

    } else clearInterval(changeFocus);
}

function stopPropagation(event) {
    event.stopPropagation();    
};