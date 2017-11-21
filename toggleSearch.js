function toggleSearch() {
    var searchBlock = document.getElementById('block-views-exp-search-page');
    searchBlock.classList.toggle('opened');
}

function stopPropagation(event) {
    event.stopPropagation();    
};