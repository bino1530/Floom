    $(document).ready(function() {
        var $view = $('.view-left');
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $view.addClass('appear');
                }
            });
        });
        observer.observe($view[0]);
    });

    $(document).ready(function() {
        var $view = $('.view-right');
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $view.addClass('appear');
                }
            });
        });
        observer.observe($view[0]);
    });

    $(document).ready(function() {
        var $view = $('.view-show');
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $view.addClass('appear');
                }
            });
        });
        observer.observe($view[0]);
    });