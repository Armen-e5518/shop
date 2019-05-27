(function ($) {
   "use strict"

   // Mobile Nav toggle
   $('.menu-toggle > a').on('click', function (e) {
      e.preventDefault();
      $('#responsive-nav').toggleClass('active');
   })

   // Fix cart dropdown from closing
   $('.cart-dropdown').on('click', function (e) {
      // e.stopPropagation();
   });

   /////////////////////////////////////////

   // Products Slick
   $('.products-slick').each(function () {
      var $this = $(this),
         $nav = $this.attr('data-nav');

      $this.slick({
         slidesToShow: 4,
         slidesToScroll: 1,
         autoplay: true,
         infinite: true,
         speed: 300,
         dots: false,
         arrows: true,
         appendArrows: $nav ? $nav : false,
         responsive: [{
            breakpoint: 991,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 1,
            }
         },
            {
               breakpoint: 480,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
               }
            },
         ]
      });
   });

   // Products Widget Slick
   $('.products-widget-slick').each(function () {
      var $this = $(this),
         $nav = $this.attr('data-nav');

      $this.slick({
         infinite: true,
         autoplay: true,
         speed: 300,
         dots: false,
         arrows: true,
         appendArrows: $nav ? $nav : false,
      });
   });

   /////////////////////////////////////////

   // Product Main img Slick
   $('#product-main-img').slick({
      infinite: true,
      speed: 300,
      dots: false,
      arrows: true,
      fade: true,
      asNavFor: '#product-imgs',
   });

   // Product imgs Slick
   $('#product-imgs').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      centerMode: true,
      focusOnSelect: true,
      centerPadding: 0,
      vertical: true,
      asNavFor: '#product-main-img',
      responsive: [{
         breakpoint: 991,
         settings: {
            vertical: false,
            arrows: false,
            dots: true,
         }
      },
      ]
   });

   // Product img zoom
   var zoomMainProduct = document.getElementById('product-main-img');
   if (zoomMainProduct) {
      $('#product-main-img .product-preview').zoom();
   }

   /////////////////////////////////////////

   // Input number
   $('.input-number').each(function () {
      var $this = $(this),
         $input = $this.find('input[type="number"]'),
         up = $this.find('.qty-up'),
         down = $this.find('.qty-down');

      down.on('click', function () {
         var value = parseInt($input.val()) - 1;
         value = value < 1 ? 1 : value;
         $input.val(value);
         $input.change();
         updatePriceSlider($this, value)
      })

      up.on('click', function () {
         var value = parseInt($input.val()) + 1;
         $input.val(value);
         $input.change();
         updatePriceSlider($this, value)
      })
   });

   var priceInputMax = document.getElementById('price-max'),
      priceInputMin = document.getElementById('price-min');

   if (priceInputMax) {
      priceInputMax.addEventListener('change', function () {
         updatePriceSlider($(this).parent(), this.value)
      });
   }

   if (priceInputMin) {
      priceInputMin.addEventListener('change', function () {
         updatePriceSlider($(this).parent(), this.value)
      });
   }


   function updatePriceSlider(elem, value) {
      if (elem.hasClass('price-min')) {
         console.log('min')
         priceSlider.noUiSlider.set([value, null]);
      } else if (elem.hasClass('price-max')) {
         console.log('max')
         priceSlider.noUiSlider.set([null, value]);
      }
   }

   // Price Slider
   var priceSlider = document.getElementById('price-slider');
   if (priceSlider) {
      noUiSlider.create(priceSlider, {
         start: [_From, _To],
         connect: true,
         step: 1,
         range: {
            'min': 100,
            'max': 10000
         }
      });

      priceSlider.noUiSlider.on('update', function (values, handle) {
         var value = values[handle];
         handle ? priceInputMax.value = value : priceInputMin.value = value
      });
   }

   $('.add_fav').click(function () {
      var ob = $(this);
      var data = {};
      data.id = $(this).attr('data-id');
      $.ajax({
         type: "POST",
         url: "/ajax/add-fav",
         data: data,
         success: function (res) {
            if (res) {
               ob.find('i').toggleClass("fa-heart-o fa-heart");
               if (res == 'Add') {
                  $('#fav_count').html($('#fav_count').html() * 1 + 1)
               } else {
                  $('#fav_count').html($('#fav_count').html() * 1 - 1)
               }
            }
         }
      });
   })
   $('.add_cart').click(function () {
      var ob = $(this);
      var data = {};
      data.id = $(this).attr('data-id');
      $.ajax({
         type: "POST",
         url: "/ajax/add-cart",
         data: data,
         success: function (res) {
            if (res) {
               var Ob_exist = $('.product-widget[ data-id="' + data.id + '"]');
               if (res.action == 'Add' && Ob_exist.length == 0) {
                  $('#cart-list').append(`
                     <div class="product-widget" data-id="` + res.product.id + `">
                         <div class="product-img">
                            <img src="/admin/uploads/` + res.img + `" alt="">
                         </div>
                         <div class="product-body">
                            <h3 class="product-name"><a href="/site/view?id=` + data.id + `">` + res.product.name + `</a></h3>
                            <h4 class="product-price" data-price="` + res.product.price + `">
                               <span class="qty"><span class="product_count">1</span>x</span>$` + res.product.price + `.00
                            </h4>
                         </div>
                         <button class="delete remove_cart" data-id="` + data.id + `"><i class="fa fa-close"></i></button>
                      </div>
                  `)
                  $('#carts_id').html($('#carts_id').html() * 1 + 1)
               } else {
                  Ob_exist.find('.product_count').html(Ob_exist.find('.product_count').html() * 1 + 1)
               }

               UpdateCarts();
            }
         }
      });
   });

   $(document).on('click', '.remove_cart', function (e) {
      e.preventDefault()
      console.log('ok')
      var ob = $(this);
      var data = {};
      data.id = $(this).attr('data-id');
      $.ajax({
         type: "POST",
         url: "/ajax/remove-cart",
         data: data,
         success: function (res) {
            if (res) {
               $('.product-widget[ data-id="' + data.id + '"]').remove();
               $('#carts_id').html($('#carts_id').html() * 1 - 1)
               UpdateCarts();
            }
         }
      });
      e.stopPropagation()
   });

   var UpdateCarts = function () {
      var price = 0;
      var count = 0;
      $('#cart-list .product-widget').each(function () {
         price += $(this).find('.product-price').attr('data-price') * $(this).find('.product_count').html() * 1;
         count++;
      })
      $('.item-count').html(count)
      $('.total-price').html(price)
   }
})(jQuery);
