<!DOCTYPE html>
  <html lang="en">
  <!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:31 GMT -->

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    * {
      padding: 0;
      margin: 0;
    }
    
    body {
      padding: 40px;
    }
    
    a {
      font-size: small;
      margin-top: 10px;
      position: relative;
      display: inline-block;
    }
    
    .min-max-slider {
      position: relative;
      width: 200px;
      text-align: center;
      margin-bottom: 50px;
    }
    
    .min-max-slider > label {
      display: none;
    }
    
    span.value {
      height: 1.7em;
      font-weight: bold;
      display: inline-block;
    }
    
    span.value.lower::before {
      content: "€";
      display: inline-block;
    }
    
    span.value.upper::before {
      content: "- €";
      display: inline-block;
      margin-left: 0.4em;
    }
    
    .min-max-slider > .legend {
      display: flex;
      justify-content: space-between;
    }
    
    .min-max-slider > .legend > * {
      font-size: small;
      opacity: 0.25;
    }
    
    .min-max-slider > input {
      cursor: pointer;
      position: absolute;
    }
    /* webkit specific styling */
    
    .min-max-slider > input {
      -webkit-appearance: none;
      outline: none!important;
      background: transparent;
      background-image: linear-gradient(to bottom, transparent 0%, transparent 30%, silver 30%, silver 60%, transparent 60%, transparent 100%);
    }
    
    .min-max-slider > input::-webkit-slider-thumb {
      -webkit-appearance: none;
      /* Override default look */
      appearance: none;
      width: 14px;
      /* Set a specific slider handle width */
      height: 14px;
      /* Slider handle height */
      background: #eee;
      /* Green background */
      cursor: pointer;
      /* Cursor on hover */
      border: 1px solid gray;
      border-radius: 100%;
    }
    
    .min-max-slider > input::-webkit-slider-runnable-track {
      cursor: pointer;
    }
    </style> @include('layouts.links')
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> </head>

  <body class="sidebar-dark">
    <div class="container-scroller"> @include('layouts.header')
      <div class="container-fluid page-body-wrapper"> @include('layouts.sidebar') @yield('content') </div> @include('layouts.footer') </div> @include('layouts.scripts')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("tbody").on("click", ".edit", function(e) {
        console.log("Edit button clicked")
        let id = $(this).attr("data-id");
        let name = $(this).attr("data-name");
        let age = $(this).attr("data-age");
        let address = $(this).attr("data-address");
        let department = $(this).attr("data-department");
        let image = $(this).attr("data-image");
        $("#record_id").val(id)
        $("#name").val(name)
        $("#age").val(age)
        $("#address").val(address)
        $("#department").val(department)
        $("#image_path").val(image)
      })

      function sort_price_filter() {
        var start = $(this).attr('data').html()
        alert(start);
      }
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 100,
        values: [15, 65],
        slide: function(event, ui) {
          $("#min").val(ui.values[0]);
          $("#max").val(ui.values[1]);
          var min = $('#min').val();
          var max = $('#max').val();
          alert(end)
        }
      });
    })
    </script>
    <script>
    $(document).ready(function() {});
    </script>
    <script type="text/javascript">
    var thumbsize = 14;

    function draw(slider, splitvalue) {
      /* set function vars */
      var min = slider.querySelector('.min');
      var max = slider.querySelector('.max');
      var lower = slider.querySelector('.lower');
      var upper = slider.querySelector('.upper');
      var legend = slider.querySelector('.legend');
      var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
      var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
      var rangemin = parseInt(slider.getAttribute('data-rangemin'));
      var rangemax = parseInt(slider.getAttribute('data-rangemax'));
      /* set min and max attributes */
      min.setAttribute('max', splitvalue);
      max.setAttribute('min', splitvalue);
      /* set css */
      min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
      max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
      min.style.left = '0px';
      max.style.left = parseInt(min.style.width) + 'px';
      min.style.top = lower.offsetHeight + 'px';
      max.style.top = lower.offsetHeight + 'px';
      legend.style.marginTop = min.offsetHeight + 'px';
      slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';
      /* correct for 1 off at the end */
      if(max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);
      /* write value and labels */
      max.value = max.getAttribute('data-value');
      min.value = min.getAttribute('data-value');
      lower.innerHTML = min.getAttribute('data-value');
      upper.innerHTML = max.getAttribute('data-value');
    }

    function init(slider) {
      /* set function vars */
      var min = slider.querySelector('.min');
      var max = slider.querySelector('.max');
      var rangemin = parseInt(min.getAttribute('min'));
      var rangemax = parseInt(max.getAttribute('max'));
      var avgvalue = (rangemin + rangemax) / 2;
      var legendnum = slider.getAttribute('data-legendnum');
      /* set data-values */
      min.setAttribute('data-value', rangemin);
      max.setAttribute('data-value', rangemax);
      /* set data vars */
      slider.setAttribute('data-rangemin', rangemin);
      slider.setAttribute('data-rangemax', rangemax);
      slider.setAttribute('data-thumbsize', thumbsize);
      slider.setAttribute('data-rangewidth', slider.offsetWidth);
      /* write labels */
      var lower = document.createElement('span');
      var upper = document.createElement('span');
      lower.classList.add('lower', 'value');
      upper.classList.add('upper', 'value');
      lower.appendChild(document.createTextNode(rangemin));
      upper.appendChild(document.createTextNode(rangemax));
      slider.insertBefore(lower, min.previousElementSibling);
      slider.insertBefore(upper, min.previousElementSibling);
      /* write legend */
      var legend = document.createElement('div');
      legend.classList.add('legend');
      var legendvalues = [];
      for(var i = 0; i < legendnum; i++) {
        legendvalues[i] = document.createElement('div');
        var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
        legendvalues[i].appendChild(document.createTextNode(val));
        legend.appendChild(legendvalues[i]);
      }
      slider.appendChild(legend);
      /* draw */
      draw(slider, avgvalue);
      /* events */
      min.addEventListener("input", function() {
        update(min);
      });
      max.addEventListener("input", function() {
        update(max);
      });
    }

    function update(el) {
      /* set function vars */
      var slider = el.parentElement;
      var min = slider.querySelector('#min');
      // console.log(min);
      var max = slider.querySelector('#max');
      var minvalue = Math.floor(min.value);
      var maxvalue = Math.floor(max.value);
      /* set inactive values before draw */
      min.setAttribute('data-value', minvalue);
      max.setAttribute('data-value', maxvalue);
      var avgvalue = (minvalue + maxvalue) / 2;
      /* draw */
      draw(slider, avgvalue);
    }
    var sliders = document.querySelectorAll('.min-max-slider');
    sliders.forEach(function(slider) {
      init(slider);
    });
    function sort_price_filter() {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 5000,
        values: [0, 6000],
        slide: function(event, ui) {
          $("#min").val(ui.values[0]);
          $("#max").val(ui.values[1]);
        }
      });
      // $('.searchResult').html('<div id="loading">Loading .....</div>');
      var min = $('#min').val();
      var max = $('#max').val();
      $.ajax({
        type: "get",
        Datatype: "JSON",
        url: "{{ route('fetchproduct') }}",
        data: {min:min , max:max},
        // data: "min=" + min + "& max=" + max,
        success: function(data) {
          console.log(data);
          $('#coding').html(data.body);
          $("#coding").show()
        
        }
      });
    }
    </script>
  </body>

  </html>