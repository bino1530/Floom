      <div class="bg-pink view-show">
        <div class="floom-row">
          <div class="floom-info">
            <div class="floom-info-topic">
              <h1>
                Unique flowers & gifts by local florists across the U.S.
              </h1>
            </div>
            <div class="floom-info-zip">
              <i class="fa-solid fa-house fa-xl"></i>
              <input type="text" placeholder="Address" />
              <i class="fa-solid fa-calendar fa-xl"></i>
              <select name="" id="">
                <option value=""></option>
              </select>
              <button href="" class="button-shop">Shop Now</button>
            </div>
            <div class="floom-info-check">
              <p>
                <i class="fa-solid fa-circle-check fa-xl"></i> What you see is
                what you get guarantee
              </p>
              <p>
                <i class="fa-solid fa-circle-check fa-xl"></i> Same-day &
                next-day delivery
              </p>
              <p>
                <i class="fa-solid fa-circle-check fa-xl"></i> Over 4000
                lovingly-made, seasonal bouquets to choose from
              </p>
            </div>
          </div>
          <div class="floom-ads">
            <img src="asset/image/index/background_pink.avif" alt="" />
          </div>
        </div>
      </div>
      <div class="seller-row">
        <div class="col-12 col-12-sm col-12-lg">
          <p>
            Simply the best , better than all the rest - according to you.
            <strong>Shop Now</strong>
          </p>
        </div>
      </div>
      <?php
      include("includes/connect.php");
      $sql = "SELECT * FROM tb_sanpham WHERE Ma_DanhMuc = 'BS_01' LIMIT 4";
      $sta = $conn->prepare($sql);
      $sta->execute();
      $product = $sta->fetchAll(PDO::FETCH_OBJ);
      ?>
      <div class="best-seller-container">
        <h1>Best-Selling</h1>
        <div class="best-seller-row row">
          <?php
          if (!empty($product)) {
            $i = 1;
            foreach ($product as $product) {
              $imagesArray = json_decode($product->HinhAnh, true);
              $profilePic = "data:image/jpeg;base64," . $imagesArray[0];
          ?>
              <div class="best-seller-col col-lg-3 col-sm-6 col-12 view-show">
                <div class="best-seller-image new">
                  <img src="<?= $profilePic ?>" alt="" />
                </div>
                <div class="best-seller-info">
                  <p><strong><?= $product->TenSanPham ?></strong></p>
                  <p>from <strong><?= $product->Gia?>$</strong></p>
                </div>
                <hr />
                <div class="best-seller-sales-off">
                  <span class="text-blue">Subscribe for 30% off</span>
                  <span class="text-blue">from <?= round($product->Gia * 0.7, 2) ?></span>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="banner-of-store">
        <div class="grid">
          <div class="Monthly_Flowers view-left">
            <div class="Monthly_Flowers-image">
              <img src="asset/image/index/Monthly_Flowers.avif" alt="" />
            </div>
            <div class="Monthly_Flowers-info">
              <p>45,000 5-Star Reviews</p>
              <h1>
                Monthly Flower <br />
                Subscriptions
              </h1>
              <p>
                Get a monthly mood boost with fresh flowers on repeat!
                Starting at $48 + free shipping.
              </p>
              <div class="starts-subscription">
                <button href="">Start A Subscription</button>
              </div>
            </div>
          </div>
        </div>

        <div class="grid">
          <div class="Flowers-Delivery view-right">
            <div class="Flowers-Delivery-image">
              <img src="asset/image/index/Flowers-Delivery.jpg" alt="" />
            </div>
            <div class="Flowers-Delivery-info">
              <p>NYC, LA, CHI + MORE</p>
              <h1>
                Flowers Delivered <br />
                TODAY
              </h1>
              <p>
                Whoops moment? Let flowers save the day. 🌸 A little bloom, a
                big smile! 🌿
              </p>
              <div class="Order-Same-Day">
                <button href="">Order Same Day</button>
              </div>
            </div>
          </div>
        </div>
        <div class="grid">
          <div class="Birthday-Flowers view-left">
            <div class="Birthday-Flowers-image">
              <img src="asset/image/index/Flowers-Birthday.jpg" alt="" />
            </div>
            <div class="Birthday-Flowers-info">
              <h1>
                Birthday Bouquets <br />
                that WOW
              </h1>
              <p>
                Not sure what to get them? Flowers are always a good idea.
              </p>
              <div class="Shop-Birthday">
                <button href="">Shop Birthday</button>
              </div>
            </div>
          </div>
        </div>

        <div class="grid">
          <div class="Visit-My-Flowers view-right">
            <div class="Visit-My-Flowers-image">
              <img src="asset/image/index/Visit1.jpg" alt="" />
            </div>
            <div class="Visit-My-Flowers-info">
              <p>OPEN IN SF, SD, LA + OC</p>
              <h1>
                Visit Our <br />
                Flower Shops
              </h1>
              <p>
                Shop for Floom at select Whole Foods Markets or at our retail
                location in LA
              </p>
              <div class="Shop-Now">
                <button href="">Shop Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="Share-To_Floom view-show">
        <h4>
          We were tired of generic bouquets falling short, so we created
          Floom—a marketplace where top U.S. florists craft unique,
          high-quality arrangements. Each bouquet is designed with care by
          vetted local florists, ensuring it’s just as special as it looks
          online.
        </h4>
      </div>
      <div class="grid">
      <div class="Media-From-Guest view-show">
        <div class="Media-row">
          <div class="media">
            <div class="video-overlay"></div>
            <video class="media-1-source media-position" autoplay muted loop>
              <source
                src="asset/media/bed_side_bouquet (1080p).mp4"
                type="video/mp4" />
            </video>
          </div>
          <div class="media">
            <div class="video-overlay-bottom"></div>
            <video class="media-2-source media-position" autoplay muted loop>
              <source
                src="asset/media/floom-uk-london-sameday_delivery-editorial3 (1080p).mp4"
                type="video/mp4" />
            </video>
          </div>
          <div class="media">
            <div class="video-overlay"></div>
            <video class="media-3-source media-position" autoplay muted loop>
              <source
                src="asset/media/untitled (1080p).mp4"
                type="video/mp4" />
            </video>
          </div>
        </div>
      </div>
      </div>
      

      <div class="Floom-Benefits view-show">
        <h2>Why send flowers with Floom?</h2>
        <div class="Floom-Benefits-Row row">
          <div class="Floom-Benefits-col col-lg-4 col-sm-12 col-12">
            <div class="Floom-Benefits-image">
              <img src="asset/image/index/Flowers-eyes.gif" alt="" />
              <p><strong>What you see is what you get</strong></p>
              <p>
                Love the bouquet on your screen? That's exactly what our local
                florist will prepare freshly for your order... or your money
                back!
              </p>
            </div>
          </div>
          <div class="Floom-Benefits-col col-lg-4 col-sm-12 col-12">
            <div class="Floom-Benefits-image">
              <img src="asset/image/index/sun.gif" alt="" />
              <p><strong>Always unique, never generic </strong></p>
              <p>
                We only work with the most talented and unique artisans, and
                we're passionate about supporting our skilled family of
                florists.
              </p>
            </div>
          </div>
          <div class="Floom-Benefits-col col-lg-4 col-sm-12 col-12">
            <div class="Floom-Benefits-image">
              <img src="asset/image/index/hands.gif" alt="" />
              <p><strong>Hand-delivered with care and attention</strong></p>
              <p>
                Each of our orders is professionally arranged, wrapped and
                safely delivered with a hand-written card… on the exact day
                that you need it.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="Custom-Flowers view-show">
          <h2>Custom-Crafted to Fit your Unique Needs</h2>
          <p class="Custom-Flowers-Content">
            Looking for the perfect gift for someone special? Our artisan
            florists expertly craft stunning flower arrangements for any
            occasion. Whether it’s a birthday, anniversary, or just because,
            we create unique bouquets that you can rely on, and are sure to
            impress.
          </p>
        </div>
        <div class="Custom-Flowers-Row row view-show">
          <div class="Custom-Flowers-Col col-lg-3 col-sm-6 col-12">
            <div class="Custom-Flowers-image common-title title-birthdays">
              <img
                src="asset/image/index/floom-birthday-category.avif"
                alt="" />
            </div>
          </div>
          <div class="Custom-Flowers-Col col-lg-3 col-sm-6 col-12">
            <div class="Custom-Flowers-image common-title title-new-baby">
              <img
                src="asset/image/index/floom-new-baby-flowers.avif"
                alt="" />
            </div>
          </div>
          <div class="Custom-Flowers-Col col-lg-3 col-sm-6 col-12">
            <div class="Custom-Flowers-image common-title title-anniversary">
              <img
                src="asset/image/index/floom-pink-hero-vday.avif"
                alt="" />
            </div>
          </div>
          <div class="Custom-Flowers-Col col-lg-3 col-sm-6 col-12">
            <div class="Custom-Flowers-image common-title title-sympathy">
              <img src="asset/image/index/floom-sympathy-hero.avif" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="The-Question view-show">
          <div class="For-More-Question">
            <p class="flip dropdown-status">Send Flowers Online Year-Round</p>
            <p class="panel">
              Good news! The farms we partner with work year-round to make
              sure you’re covered for every holiday or occasion, every little
              moment or milestone, and even just because. The ultimate day to
              celebrate with farm-fresh flower delivery? Well, make Mom’s
              Mother’s Day one to remember with an arrangement of her faves,
              all freshly sourced from one of our sustainable farms. (Hint:
              lots of moms LOVE tulips). Is it even Valentine’s Day without
              red roses to express love or passion? We can’t forget about
              birthday flowers! For birthdays, sunflowers are always a hit.
              Sometimes life’s moments aren’t ideal, though, and lots of our
              customers turn to lilies as classic sympathy flowers.
            </p>
            <p class="panel">
              No matter the occasion, these once-in-a-lifetime moments mean
              something. And when the act of receiving or sending flowers is
              involved, these occasions can mean even more. So, the next time
              you’re looking for online flower delivery, remember that The
              Floom has your back with a fantastic selection of bouquets, lush
              plants, and thoughtful gift sets.
            </p>
          </div>

          <div class="For-More-Question not-top">
            <p class="flip dropdown-status">
              Handcrafted Floom Designed by Expert Florists
            </p>
            <p class="panel">
              Whenever you want to order flowers online, whether it’s to say
              "I love you,” “I miss you,” or "I'm sorry for your loss," one of
              our farmers planted, cared for, and cut the Bouq you’ve chosen.
              That one. The one that’s bloomed and ready to deliver your
              heartfelt message. And before those flowers were even planted,
              cut, and assembled, it was one of our master floral designers
              that concocted that exact combination of colors and blooms that
              make up your Bouq. Our florists pride themselves on offering
              unique bouquets that stand out amongst the competition. Even our
              more classic styles have a modern twist to them!
            </p>
            <p class="panel">
              Whether it’s for an anniversary or a friend’s housewarming, or
              any other singular moment in between, don’t settle for anything
              less than The Floom Co. Our original vision began with a simple
              goal to bring the act of ordering flowers into the future
              through sustainable farming practices and standards, as well as
              by cutting out the middleman and shipping directly to your
              recipient’s door. For more than a decade, we’ve also been
              dedicated to crafting exclusive, one-of-a-kind bouquets that you
              won’t find available from the competition.
            </p>
            <p class="panel">
              We also have a handful of local Floom Co. Flower Shops in
              certain areas of the country, including Los Angeles and San
              Francisco. You can actually visit our Floom florists in person
              and get a handcrafted arrangement that you can bring straight
              home to a loved one or surprise a friend with at their latest
              get-together! These local flower shops also allow us to easily
              deliver your order on the same day, even if you place it online.
              Get beautiful, handcrafted Floom delivered from our amazing
              florists in New York City, Chicago, Los Angeles, San Francisco,
              San Diego, Miami, Dallas, and Orange County today.
            </p>
          </div>

          <div class="For-More-Question not-top">
            <p class="flip dropdown-status">What Sets The Floom Co. Apart?</p>
            <p class="panel">
              Floom, short for bouquets, isn’t like other online floral
              retailers. We partner directly with sustainable farms that
              minimize waste, recycle water, and protect workers’ well-being.
              This also means our Floom remain fresher and last longer. Talk
              about farm fresh! When you send flowers with us, some stems
              could be so freshly cut that they may even arrive in bud form!
              This not only means that these flowers will last a little
              longer, but it also gives your recipient something a little
              extra: the joy of watching them bloom!
            </p>
            <p class="panel">
              Some people like to plan ahead, and for those who want to be a
              bit more prepared, we highly recommend our first-class flower
              subscription service. For as little as $48 per month, you can
              customize your delivery every month with the ability to select
              the Bouq and choose where and when it gets delivered. This means
              that you can treat yourself to fresh flowers for the first
              delivery, then send flowers to your Mom for her birthday the
              next month, and follow that up by surprising a friend with
              congratulatory flowers for their latest job promotion.
            </p>
            <p class="panel">
              Plus, there are additional perks, including FREE shipping and
              discounts up to 30% off retail prices on every subscription
              order, as well as special savings every month that apply
              sitewide on additional orders. As an extra bonus, you’ll have
              peace of mind knowing life won’t distract you and the right gift
              will always be sent on time. Ah! Let’s not forget how easy it is
              to edit, skip, or cancel deliveries because, you know, we’re
              flexible.
            </p>
            <p class="panel">
              We are so grateful to work with flowers and plants that brighten
              peoples’ days. In a world where seeing each other can be
              limited, the act of sending flowers and receiving gifts in the
              mail becomes even more powerful. That’s why we do what we do: to
              celebrate connections and life’s little moments, with bouquets,
              simplified.
            </p>
          </div>

          <div class="For-More-Question not-top">
            <p class="flip dropdown-status">
              Beautiful Flowers Whenever You Need Them
            </p>
            <p class="panel">
              We get it. Life happens and then suddenly you need to send a
              gift. No need to stress, because we offer next day flower
              delivery in several places throughout the country, and same day
              flower delivery in select ZIP codes. Although planning ahead
              might mean more choices, the available selection is still the
              best of the best.
            </p>
            <p class="panel">
              To ensure your delivery arrives on time, we recommend ordering
              by 11am in the recipient’s time zone. Next day delivery is only
              available Tuesday through Saturdays, meaning orders must be
              placed between Monday and Friday. We’re working on it, but
              currently we aren’t able to deliver next day orders on Sundays
              or Mondays at the moment.
            </p>
            <p class="panel">
              Whether you order flowers online months in advance or have a
              history of cutting it a little too close and need something
              special in a hurry, we offer the best flowers online and ship
              direct to doorsteps nationwide. We hear good things come in
              flower packages, so we’re here to help you share kindness with
              the best kind of mail: farm-fresh flowers, plants, and gifts
              delivered by The Floom Co.
            </p>
          </div>
        </div>
      </div>
      </div>