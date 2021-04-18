window.algolia = algoliasearch('IL7ET3Z70M', '22396c5c33e6ed38012120f7523c435c');
window.index = algolia.initIndex('test_wf');
function search(str) {
    var classesIndex = 'test_wf';
    var methodsIndex = 'test_meth';
    window.algolia.multipleQueries([
        {
            indexName: classesIndex,
            query: str,
            params: {
                hitsPerPage: 3
            }
        },
        {
            indexName: methodsIndex,
            query: str,
            params: {
                hitsPerPage: 5
            }
        }
    ]).then(({ results  }) => {
        console.log(results);
        window.app.search_results = [];
        window.app.methods_search_results = [];
        
        for (var x = 0 ; x < results.length ; x++) {
            var hits = results[x].hits;
            var len = hits.length > 5 ? 5 : hits.length;
            
            for (var y = 0 ; y < len ; y++) {
                if (results[x].index === classesIndex) {
                    window.app.search_results.push(hits[y]);
                } else {
                    window.app.methods_search_results.push(hits[y]);
                }
            }
        }
    });
}
search('A');

