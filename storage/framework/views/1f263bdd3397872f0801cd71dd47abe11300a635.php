<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<style type="text/css">
		.fg_wid_footer img{
			display: none !important;
		}

		.fg_wid_cont{
			height:550px !important;
		}
	</style>

	<div class="container">
		<!-- Opening image section  -->
		<div class="row" id="no-margin-bottom">
			<!-- Content and button  -->
			<div class="col m6 s12">
				<h1 class=" red-text text-darken-2 center">Make Ireland <br> Great Again</h1>
				<br>
				<h5 div="light center-align">Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems and why Ireland needs a wall!</h5>
				<br>
				<div class="center">
					<a class="red darken-3 btn-large" href="<?php echo e(url('/events')); ?>" ><i class="material-icons left">star</i>Browse Events<i class="material-icons right">star</i></a>
				</div>
			</div>
			<!-- Image  -->
			<div class="col m6 s12">
				<br/>
				<img class="responsive-img center" src="<?php echo e(url('img/trumpALT.png')); ?>">
			</div>
		</div>

		<!-- Second section  -->
		<div class="divider"></div>
		<h1 class="red-text text-darken-2 center-align">Upcoming events</h1>
		<div class="divider"></div>
		<!-- Will display random event  -->
		<div class="row">
			<div class="col m6 s12">
				<img style="margin-left:auto;margin-right:auto;margin-top:10px;" width="400px" class="center materialboxed responsive-img" src="<?php echo e(url('/img/event_images')); ?>/<?php echo e($randEvent[0]->image); ?>">
			</div>            
			<!-- Random event 1  -->
			<div class="col m6 s12 center">    
				<h2 class="center-align red-text text-darken-2"><?php echo e($randEvent[0]->name); ?><br><?php echo e($randEvent[0]->city); ?></h2>
				<h5><?php echo e($randEvent[0]->information); ?></h5>
				<a class="btn red darken-3" href="<?php echo e(url('/events/details')); ?>/<?php echo e($randEvent[0]->id); ?>" style="margin-top: 20px">View Event</a>
			</div>
		</div>            
		<div class="divider"></div>
		<div class="row">           
			<div class="col m6 s12 right">
				<img style="margin-left:auto;margin-right:auto;margin-top:10px;" width="400px" class="center materialboxed responsive-img" src="<?php echo e(url('img/event_images')); ?>/<?php echo e($randEvent[1]->image); ?>">
			</div> 
			<!-- Random Event 2  -->
			<div class="col m6 s12 left">
				<div class="center">    
					<h2 class="center-align red-text text-darken-2"><?php echo e($randEvent[1]->name); ?><br><?php echo e($randEvent[1]->city); ?></h2>
					<h5><?php echo e($randEvent[1]->information); ?></h5>
					<a class="btn red darken-3" href="<?php echo e(url('events/details')); ?>/<?php echo e($randEvent[1]->id); ?>" style="margin-top: 20px">View Event</a>
				</div>
			</div>
		</div>            
		<div class="divider"></div>

		<!--Social media section-->
		<div class="row">
			<!-- Trumps twitter feed  -->    
			<div class="col s10 offset-s1 m4">
				<div class="icon-block">
					<h2 class="center red-text text-darken-1"><i class="mdi mdi-twitter"></i></h2>
					<h5 class="center red-text text-lighten-1">Twitter</h5>
					<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/realDonaldTrump" data-widget-id="701865321125249024">Tweets by Donald Trump</a>
					<script>
						!function(d,s,id){
							var js,
							fjs=d.getElementsByTagName(s)[0],
							p=/^http:/.test(d.location)?'http':'https';
							if(!d.getElementById(id)){
								js=d.createElement(s);
								js.id=id;
								js.src=p+"://platform.twitter.com/widgets.js";
								fjs.parentNode.insertBefore(js,fjs);}
							}
							(document,"script","twitter-wjs");
					</script>
				</div>
			</div>
			<!-- Trump News feed   -->
			<div class="col s10 offset-s1 m4">
				<div class="icon-block">
					<h2 class="center red-text text-darken-1"><i class="mdi mdi-newspaper"></i></h2>
					<h5 class="center red-text text-lighten-1">Trump in the news</h5>
					<div class="feedgrabbr_widget" id="fgid_b898d2c390af5a4dad390e2ab"></div>
					<script> if (typeof(fg_widgets)==="undefined") fg_widgets = new Array();fg_widgets.push("fgid_b898d2c390af5a4dad390e2ab");</script>
					<script src="http://www.feedgrabbr.com/widget/fgwidget.js"></script>
				</div>
			</div>
			<!-- Trumps Facebook feed  -->
			<div class="col s10 offset-s1 m4">
				<div class="icon-block">
					<h2 class="center red-text text-darken-1"><i class="mdi mdi-facebook"></i></h2>
					<h5 class="center red-text text-lighten-1">Facebook</h5>
					<div class="fb-page" data-href="https://www.facebook.com/DonaldTrump/" data-tabs="timeline" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/DonaldTrump/">
								<a href="https://www.facebook.com/DonaldTrump/">Donald J. Trump</a>
							</blockquote>
						</div>
					</div>
				</div>
			</div>        
		</div>
		<!-- Events button  -->
		<div class="row center">
			<a class="btn-large red darken-2" href="<?php echo e(url('/events')); ?>">Upcoming Events</a>
		</div>    
		<br><br>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>