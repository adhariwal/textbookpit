</div>
<!-- /Content -->
      <div class="footer">
        <div class="well well-sm">
          <div class="pull-left">
            <ul class="nav nav-pills">
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/post"><span class="glyphicon glyphicon-plus"></span> Post Ad</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <ul class="nav nav-pills">
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/contact">Contact</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/help">Help</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/terms">Terms & Conditions</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/privacy">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="clearfix">&nbsp;</div>
        </div>
        
        <div class="container">
        <div class="row">
        
        <div class="col-sm-6 mob-center"><small>Copyright 2016 - TextBookPit.Com | All Right Reserved</small></div>
        
        <div class="col-sm-6 text-right mob-center"><small>Powered By <a href="http://www.greatwebidea.com/" target="_blank">Great Web Idea</a></small></div>
        
        </div>
        
        
        </div>
        
        
      </div>
    </div>
    <!-- JS -->
    <script src="<?php echo base_url();?>web_assest/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>web_assest/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>web_assest/js/respond.min.js"></script>
    <script src="<?php echo base_url();?>web_assest/js/jquery.slides.min.js"></script>
    <script src="<?php echo base_url();?>web_assest/js/nav.js"></script>

    <script src="<?php echo base_url();?>web_assest/js/hideMaxListItem.js"></script>


    <script type="text/javascript">
		$(document).ready(function() {
			// EXAMPLE USAGE ON 3 LISTS
			$('#content ol').hideMaxListItems();
			$('#content ul.first').hideMaxListItems({ 'max':4, 'speed':500, 'moreText':'READ MORE ([COUNT])' });
			$('#content ul.second').hideMaxListItems({
				'max':5,
				'speed':2000,
				'moreText':'+ Show more...',
				'lessText':'- Show less...   ',
				'moreHTML': '<div class="maxlist-more">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"></a></div>'
			});
			// TESTING DYNAMICALLY ADDING ITEMS AND UPDATING
			$("#dynamicAdd").on("click",function(e){
				e.preventDefault();
				$('#content ul.first').append('<li>DYNAMIC LIST ITEM 1</li><li>DYNAMIC LIST ITEM 2</li><li>DYNAMIC LIST ITEM 3</li>');
				$('#content ul.first').hideMaxListItems({ 'max':4, 'speed':500, 'moreText':'READ MORE ([COUNT])' });

			});
			$("#dynamicRemove").on("click",function(e){
				e.preventDefault();
				$('#content ul.first > li').not(':nth-child(1),:nth-child(2),:nth-child(3)').remove();
				$('#content ul.first').hideMaxListItems({ 'max':4, 'speed':500, 'moreText':'READ MORE ([COUNT])' });
			});
		});
	</script>

    <script>
    $( document ).ready(function() {
      // Drop down menu handler
      $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
      });
      // Carousel (slider)
      $('#detailCarousel').carousel({
        interval: 4000
      });
      $('[id^=carousel-selector-]').click( function(){
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length -1);
        id = parseInt(id);
        $('#detailCarousel').carousel(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $(this).addClass('selected');
      });
      $('#detailCarousel').on('slid', function (e) {
        var id = $('.item.active').data('slide-number');
        id = parseInt(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id^=carousel-selector-'+id+']').addClass('selected');
      });
    });
    </script>

    <script>
    $( document ).ready(function() {
      // Drop down menu handler
      $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
      });
    });
    </script>

    <!--<script language="JavaScript">
		  var data = '&r=' + escape(document.referrer)
			+ '&n=' + escape(navigator.userAgent)
			+ '&p=' + escape(navigator.userAgent)
			+ '&g=' + escape(document.location.href);

		  if (navigator.userAgent.substring(0,1)>'3')
			data = data + '&sd=' + screen.colorDepth
			+ '&sw=' + escape(screen.width+'x'+screen.height);

		  document.write('<a href="http://www.1freecounter.com/stats.php?i=87791" target=\"_blank\" >');
		  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=87791' + data + '">');
		  document.write('</a>');
    </script>-->
    <!-- /JS -->
  </body>
</html>