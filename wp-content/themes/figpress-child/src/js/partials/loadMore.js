if ($('.load-more-posts').length ) {
    var page = 1,
        ppp = 3;

    $('.load-more-posts').on("click", function(){
        $(this).attr("disabled", true);
        $.post(ajaxUrl, {
            action:"more_post_ajax",
            offset: (page * ppp) +1,
            ppp: ppp
        }).success(function(posts){
            page++;
            if( posts.length ) {
              $('.blog-posts-con').append(posts); //where the content gets filled in
              $('.load-more-posts').attr("disabled", false);
            }
        });
    });
}
