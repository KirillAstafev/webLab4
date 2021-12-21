function loadMore(offset) {
    console.log(offset);
    const mainContent = document.querySelector('.main-content');
    const cards = document.querySelector('.cards');
    const btnLoadMore = document.querySelector('.btn-load-more');

    const url = `/load_more.php?offset=${offset}`;
    fetch(url)
        .then(response => response.text())
        .then(result => {
            // mainContent.removeChild(btnLoadMore);
            cards.insertAdjacentHTML('beforeend', result)
        }).catch(error => console.log(error));
}





