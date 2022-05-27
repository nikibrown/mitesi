jQuery(document).ready(function($){
        var grid = document.querySelector('.cards');
        if(grid !== undefined && grid !== null) {
                var iso = new Isotope( grid, {
                        itemSelector: '.card',
                        layoutMode: 'masonry',
                        percentPosition: true,
                        masonry: {
                                columnWidth: '.card-sizer'
                        }
                });
                imagesLoaded( grid ).on( 'progress', function() {
                        iso.layout();
                });
        }
});
