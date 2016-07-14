<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Core::make('helper/concrete/asset_library');
$color = Core::make('helper/form/color');
$pkg = Package::getByHandle('ez_event');
$pkgVersion = $pkg->getPackageVersion();
$addSelected = true;
?>
<p>
<?php print Core::make('helper/concrete/ui')->tabs(array(
	array('form-einfo', t('Info'), $addSelected), array('form-eventcontent', t('Content')), array('form-links', t('Links')), array('form-options', t('Options')), array('form-design', t('Design')), array('form-help', '<i class="fa fa-question-circle"></i>')
));?>
</p>
<!-- Begin Button Setup Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-einfo">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<?php  echo $form->label("eventtitle",t("Event Title"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
					<?php  echo $form->text("eventtitle",$eventtitle); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php echo $form->label("eventdate",t("Event Date & Time"));?>
			<?php echo Core::make('helper/form/date_time')->datetime('eventdate', $eventdate); ?>
		</div>
		<p>&nbsp;</p>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
			<?php  echo $form->label("evdateFormat", t("Date Format")); ?>
			<?php  echo $form->select("evdateFormat", array("1"=>t("Day,MM,DD,YYYY; Time"), "2"=>t("MM,DD,YYYY; Time"), "3"=>("MM,DD,YYYY"), "4"=>("MM,DD; Time"), "5"=>("DD,MM,YYYY"), "6"=>("DD,MM,YYYY; Time")), $evdateFormat?$evdateFormat:"1"); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<?php  echo $form->label("ccm-b-image",t("Event Cover Image")); ?>
				<div class="input">
				<?php if($fID){ echo $al->image('ccm-b-image', 'fID', t('Choose Image'), ($fID)?File::getByID($fID):""); }
				else{
					echo $al->image('ccm-b-image', 'fID', t('Choose Image'));
				}
				?>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<?php  echo $form->label("host",t("Hosted By"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user"></i></div>
					<?php  echo $form->text("host",$host); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<?php  echo $form->label("location1",t("Location - Line 1"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
					<?php  echo $form->text("location1",$location1); ?>
				</div>
			</div>
			<div class="form-group">
				<?php  echo $form->label("location2",t("Location - Line 2"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
					<?php  echo $form->text("location2",$location2); ?>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<?php  echo $form->label("ephone",t("Phone"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-phone"></i></div>
					<?php  echo $form->text("ephone",$ephone); ?>
				</div>
			</div>
			<div class="form-group">
				<?php  echo $form->label("email",t("Email"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
					<?php  echo $form->email("email",$email); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Begin Button Event Content Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-eventcontent">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label><?php echo t('Event Details') ?></label>
				<?php echo Core::make('editor')->outputBlockEditModeEditor($view->field('eventcontent'), $eventcontent); ?>
			</div>
		</div>
	</div>
</div>
<!-- Begin Links Setup Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-links">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<?php  echo $form->label("eventurl",t("Website"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-link"></i></div>
					<?php  echo $form->text("eventurl",$eventurl); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<?php  echo $form->label("fbevent",t("Facebook Event"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-facebook"></i></div>
					<div class="input-group-addon">Facebook.com/events/</div>
					<?php  echo $form->text("fbevent",$fbevent); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<?php  echo $form->label("meetup",t("Meetup"));?>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
					<div class="input-group-addon">Meetup.com/</div>
					<?php  echo $form->text("meetup",$meetup); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<?php  echo $form->label("eventbrite",t("Eventbrite"));?>
				<div class="input-group">
					<div class="input-group-addon">Eventbrite.com/</div>
					<?php  echo $form->text("eventbrite",$eventbrite); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Begin Options Setup Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-options">
	<div class="row">
		<div class="col-xs-12">
			<h4><?php echo t('Accessibility')?></h4>
			<div class="form-group">
				<p><input type="checkbox" name="handicap" value="1" <?php if ($handicap == 1) { ?> checked <?php } ?>  /> <?php echo t('Handicap Accessible');?></p>
			</div>
			<div class="form-group">
				<p><input type="checkbox" name="signing" value="1" <?php if ($signing == 1) { ?> checked <?php } ?>  /> <?php echo t('Sign Language Available');?></p>
			</div>
			<div class="form-group">
				<p><input type="checkbox" name="closedcap" value="1" <?php if ($closedcap == 1) { ?> checked <?php } ?>  /> <?php echo t('Closed Captioning');?></p>
			</div>
			<div class="form-group">
				<p><input type="checkbox" name="lodging" value="1" <?php if ($lodging == 1) { ?> checked <?php } ?>  /> <?php echo t('Lodging Available');?></p>
			</div>
			<div class="form-group">
				<p><input type="checkbox" name="transport" value="1" <?php if ($transport == 1) { ?> checked <?php } ?>  /> <?php echo t('Transportation Available');?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h4><?php echo t('General Settings')?></h4>
			<div class="form-group">
				<p><input type="checkbox" name="emobf" value="1" <?php if ($emobf == 1) { ?> checked <?php } ?>  /> <?php echo t('Obfuscate email');?></p>
			</div>
			<div class="form-group">
				<p><input type="checkbox" name="maplink" value="1" <?php if ($maplink == 1) { ?> checked <?php } ?>  /> <?php echo t('Link Location to Google map');?></p>
			</div>
		</div>
	</div>
</div>
<!-- Begin Design Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-design">
	<h3><?php echo t('Colors')?></h3>
	<div class="row">
		<div class="col-xs-3">
			<div class="form-group">
				<label class="form-label"><?php echo t('Title Color')?></label><br />
				<?php $color->output('evTitleColor', $evTitleColor?$evTitleColor:"#333333");?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
				<label class="form-label"><?php echo t('Title Background')?></label><br />
				<?php $color->output('evTitleBgColor', $evTitleBgColor?$evTitleBgColor:"rgba(255,255,255,0.7)", array('showAlpha' => 'true'));?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
				<label class="form-label"><?php echo t('Date Color')?></label><br />
				<?php $color->output('evDateColor', $evDateColor?$evDateColor:"#333333");?>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
				<label class="form-label"><?php echo t('Date Background')?></label><br />
				<?php $color->output('evDateBgColor', $evDateBgColor?$evDateBgColor:"rgba(255,255,255,0.7)", array('showAlpha' => 'true'));?>
			</div>
		</div>
	</div>
	<h3><?php echo t('Layout')?></h3>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
			<?php  echo $form->label("ezeAlign", t("Header Alignment")); ?>
			<?php  echo $form->select("ezeAlign", array("left"=>t("Left Align"), "rightalign"=>t("Right Align"), "centered"=>("Centered")), $ezeAlign?$ezeAlign:"left"); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<p style="margin: 20px;"><span><strong><?php echo t('Cover Height: ')?></strong></span>
			<span class="evHeight_slider"><?php if (isset($evHeight)){ echo $evHeight; } else { echo '200'; } ?></span>px
			<?php echo $form->text('evHeight', $evHeight, array('class'=>'evHeight_slider')); ?>
			<div class="evHeight_slider" style="margin: 0px 30px 0px 30px;"></div>
		</p>
		</div>
	</div>
</div>
<!-- Begin Help Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-help">
	<div class="row">
		<div class="col-xs-12">
			<p><strong><?php echo t('Version: %s', $pkgVersion);?></strong></p>
			<p><a href="http://www.concrete5.org/marketplace/addons/ez-event" target="_blank"><?php echo t('Marketplace Page')?></a></p>
			<p><?php echo t('Developed by')?> <a href="https://www.concrete5.org/profile/-/view/11911/" target="_blank">Pine Creative Labs</a></p>
			<hr />
			<p><strong><?php echo t('Obfuscate Email')?></strong> - <?php echo t('Enabling this option will encrypt the email to protect against spambots.')?></p>
			<p><strong><?php echo t('Rightside Layout')?></strong> - <?php echo t('Use the custom template Rightside to make the image appear on the right (on larger devices).')?></p>
			<hr />
			<p><strong><?php echo t('Location')?></strong> - <?php echo t('Location lines 1 and 2 will be combined when linking to Google map.')?></p>
		</div>
	</div>
</div>

<!-- Activate Each Slider Control -->
<script type="text/javascript">
$('input.evHeight_slider').hide();
$('div.evHeight_slider').
  slider(
    { min  : 180,
      step : 10,
      max  : 400,
      value: parseInt($('span.evHeight_slider').text(),10),
      slide: function(event, uiobj) {
               $('span.evHeight_slider').text(uiobj.value);
               $('input.evHeight_slider').val(uiobj.value);
             }
    });
	$(document).ready(function () {
        $('#ccm-block-form .nav-tabs a').on('click' ,function() {
            $('#ccm-block-form').trigger('click');
        });
    })
</script>
