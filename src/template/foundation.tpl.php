<div class="reveal" id="popup-<?php echo $name; ?>"
     data-reveal data-close-on-click="true"
     data-animation-in="<?php echo $dataAnimationIn; ?>" data-animation-out="<?php echo $dataAnimationOut; ?>">

	<?php if ($title) : ?>
		<div class="title">
			<?php echo $title; ?>
		</div>
	<?php endif; ?>

	<div class="wrap-form">
		<?php echo $form->content(); ?>
	</div>

	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
