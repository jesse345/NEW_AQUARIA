<div class="blog-posts mb-5">
    <div class="container">
        <h2 class="title text-center mb-4">From Our Blog</h2>
        <!-- End .title text-center -->

        <div class="owl-carousel owl-simple mb-3" data-toggle="owl" data-owl-options='{
                      "nav": false, 
                      "dots": true,
                      "items": 3,
                      "margin": 20,
                      "loop": false,
                      "responsive": {
                          "0": {
                              "items":1
                          },
                          "600": {
                              "items":2
                          },
                          "992": {
                              "items":3
                          }
                      }
                  }'>


            <?php $blogs = getAllPost('breedersblog');
            while($blog = mysqli_fetch_assoc($blogs)){
            ?>
            <article class="entry">
                <figure class="entry-media">
                    <a href="comment.php?breedersblog_id=<?php echo $blog['id']?>">
                        <img src="../img/<?php echo $blog['image']?>" alt="image desc" />
                    </a>
                </figure>
                <!-- End .entry-media -->

                <div class="entry-body text-center">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 1 Comments
                    </div>
                    <!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="comment.php?breedersblog_id=<?php echo $blog['id']?>"><?php echo $blog['purpose']?></a>
                    </h3>
                    <!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="comment.php?breedersblog_id=<?php echo $blog['id']?>" class="read-more">Read More</a>
                    </div>
                    <!-- End .entry-content -->
                </div>
                <!-- End .entry-body -->
            </article>
            <?php }?>
            <!-- End .entry -->

           


        </div>
        <!-- End .owl-carousel -->
    </div>
    <!-- End .container -->
</div>
<!-- End .blog-posts -->