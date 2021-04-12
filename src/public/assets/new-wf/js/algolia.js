const algolia = algoliasearch('IL7ET3Z70M', '22396c5c33e6ed38012120f7523c435c');
window.index = algolia.initIndex('test_wf');
function search(str) {
    window.index.search(str).then(({ hits }) => {
        console.log(hits);
    });
}