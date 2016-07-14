<?php defined('C5_EXECUTE') or die("Access Denied.");
$ih = Core::make("helper/image");
$pkg = Package::getByHandle('ez_event');
$img = File::getByID($fID);
if(is_object($img)){
    $thumb = $ih->getThumbnail($img,250,250,true);	
    $large = $ih->getThumbnail($img,500,550,false);
}
//Define array to be checked for accessibility
$anyaccess = array($handicap, $signing, $closedcap, $lodging, $transport);
//Get Package Path
$packagePath = $pkg->getRelativePath();
$packPath = $packagePath.'/blocks/ez_event/';
//Define strings to be removed from Website link 
$hypertext = array("http://","https://"); 
//Google Map Link set-up
$gmaps = array("."," ");
$gmaplink = "https://www.google.com/maps/place/".str_replace($gmaps,"+",$location1."+".$location2);
//Obfuscate Email
$obfemail = $email;
	$obfuscatedEmail = "";
	for ($i=0; $i<strlen($obfemail); $i++){
		$obfuscatedEmail .= "&amp;#" . ord($obfemail[$i]) . ";";
	}
?>
<style>
	#ezevent-<?php echo $bID ?> .eze-cover h3 { background: <?php echo $evTitleBgColor ?>; color: <?php echo $evTitleColor ?>; }
	#ezevent-<?php echo $bID ?> .eze-cover h4 { background: <?php echo $evDateBgColor ?>; color: <?php echo $evDateColor ?>; }
	#ezevent-<?php echo $bID ?> .eze-cover { height: <?php echo $evHeight ?>px; }
</style>
<div class="ezevent-wrap" id="ezevent-<?php echo $bID ?>">
	<div class="eze-cover" style="background-image: url(<?php if (isset($img)){ echo $img->getURL(); } else { echo $packPath ?>images/party-demo.jpg<?php } ?>);">
		<h3 class="<?php echo $ezeAlign?>"><?php echo $eventtitle ?></h3>
		<?php if($evdateFormat==1){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('l, F j, Y', strtotime($eventdate));?><br /><?php echo date('h:i a', strtotime($eventdate));?></h4>
		<?php } elseif($evdateFormat==2){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('F j, Y', strtotime($eventdate));?><br /><?php echo date('h:i a', strtotime($eventdate));?></h4>
		<?php } elseif($evdateFormat==3){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('F j, Y', strtotime($eventdate));?></h4>
		<?php } elseif($evdateFormat==4){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('F j, h:i a', strtotime($eventdate));?></h4>
		<?php } elseif($evdateFormat==5){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('j F, Y', strtotime($eventdate));?></h4>
		<?php } elseif($evdateFormat==6){ ?><h4 class="<?php echo $ezeAlign?>"><?php echo date('j F, Y', strtotime($eventdate));?><br /><?php echo date('h:i a', strtotime($eventdate));?></h4><?php } ?>
	</div>
	<div class="eze-host-wrap">
		<div class="eze-host-info">
			<?php if(isset($host)&&$host!=""){ echo t('Hosted by') ?> <?php echo $host ?><br /><?php } ?>
			<?php if(isset($email)&&$email!=""){?><i class="fa fa-envelope"></i><a href="mailto:<?php if($emobf == 1){ echo $obfuscatedEmail; } else { echo $email; } ?>" target="_blank"><span><?php echo $email ?></span></a><br /><?php } ?>
			<?php if(isset($ephone)&&$ephone!=""){?><i class="fa fa-phone"></i> <?php echo $ephone;?><br /><?php } if(isset($eventurl)&&$eventurl!=""){ ?><i class="fa fa-link"></i> <a href="<?php echo $eventurl ?>" target="_blank"><?php echo t('Website')?></a><?php } ?>
		</div>
		<div class="eze-location-info">
			<?php if(isset($location1)&&$location1!=""){ echo $location1; } if(isset($location2)&&$location2!=""){ ?><br /><?php echo $location2; } ?><br />
			<?php if($maplink==1){?><a href="<?php echo $gmaplink ?>" target="_blank"><i class="fa fa-map-signs"></i> <?php echo t('Get Directions')?></a><?php } ?>
		</div>
	</div>
	<div class="eze-content">
		<?php echo $eventcontent ?>
	</div>
	<div class="eze-links">
		<?php if(isset($fbevent)&&$fbevent!=""){ ?><a href="http://www.facebook.com/events/<?php echo $fbevent ?>" target="_blank"><img class="eze-small" src="<?php echo $packPath ?>images/fb-rsvp.png" /></a><?php } ?>
		<?php if(isset($eventbrite)&&$eventbrite!=""){?><a href="http://www.eventbrite.com/<?php echo $eventbrite ?>" target="_blank"><img class="eze-small" src="<?php echo $packPath ?>images/eventbrite.png" /></a><?php } ?>
		<?php if(isset($meetup)&&$meetup!=""){ ?><a href="http://www.meetup.com/<?php echo $meetup ?>" target="_blank"><img class="eze-small" src="<?php echo $packPath ?>images/meetup.png" /></a><?php } ?>
		<?php if(isset($gcal)&&$gcal!=""){ ?><a href="http://calendar.google.com/<?php echo $gcal ?>" target="_blank"><img class="eze-small" src="<?php echo $packPath ?>images/meetup.png" /></a><?php } ?>
	</div>
	<?php if(in_array(1,$anyaccess)) { ?>
	<div class="eze-access">
		<?php if($handicap == 1){ ?><i class="fa fa-wheelchair"></i> <span><?php echo t('Handicap Accessible')?></span><br /><?php } ?>
		<?php if($signing == 1){ ?><i class="fa fa-sign-language"></i> <span><?php echo t('Sign Language Provided')?></span><br /><?php } ?>
		<?php if($closedcap == 1){ ?><i class="fa fa-cc"></i> <span><?php echo t('Closed Captioning')?></span><br /><?php } ?>
		<?php if($lodging == 1){ ?><i class="fa fa-bed"></i> <span><?php echo t('Lodging Available')?></span><br /><?php } ?>
		<?php if($transport == 1){ ?><i class="fa fa-bus"></i> <span><?php echo t('Transportation Available')?></span><?php } ?>
	</div>
	<?php } ?>
</div>