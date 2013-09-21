<div style="width: 50%; margin-left: 30px;">
	<div style="width: 50%">
		<?if(getPreviousComposition() != 'unknown'):?>
		<div class="round_button" style='margin-left: 20px; margin-top: 100px;'>
			<input type="image" name='prev' src="../../img/back.png">
		</div>
		<?else:?>
			<div class="round_button" style='margin-left: 20px; margin-top: 100px;'>
				<img src="../../img/back_inactive.png">
			</div>
		<?endif;?>
		<div class="round_button" style='margin-left: 59px; margin-top: 100px;'>
			<input type="image" name='play' src="../../img/play.png">
		</div>
		<div class="round_button" style='margin-left: 98px; margin-top: 100px;'>
			<input type="image" name='next' src="../../img/next.png">
		</div>
		<div class='grey_text' style='margin-left: 147px; margin-top: 100px;'>
			now playing
		</div>
		<div class='blue_text' style='margin-left: 147px; margin-top: 130px;'>
			<?=getCurrentAuthor()?>
			<br>
			<?=getCurrentComposition()?>
		</div>
		<div style='margin-left: 20px; margin-top: 170px;'>
			<object type="application/x-shockwave-flash" data="http://flv-mp3.com/i/pic/ump3player_500x70.swf"
					height="70" width="470"><param name="wmode" value="transparent" />
				<param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="http://flv-mp3.com/i/pic/ump3player_500x70.swf" />
				<param name="FlashVars" value="way=<?=getCurrentUrl()?>&amp;swf=http://flv-mp3.com/i/pic/ump3player_500x70.swf&amp;w=470&amp;h=70&amp;time_seconds=0&amp;autoplay=1&amp;q=&amp;skin=sky&amp;volume=70&amp;comment=" />
			</object>
		</div>
	</div>
	<div style="width: 50%">
		<div class="round_button" style='margin-left: 39px; margin-top: 300px;'>
			<input type="image" name="next" src="../../img/play.png">
		</div>
		<div style='margin-left: 78px; margin-top: 300px;'>
			<input type="image" name="next_skip" src="../../img/skip.png">
		</div>
		<div class='grey_text' style='margin-left: 147px; margin-top: 300px;'>
			next track
		</div>
		<div class='blue_text' style='margin-left: 147px; margin-top: 330px;'>
			<?=getNextAuthor()?>
			<br>
			<?=getNextComposition()?>
		</div>

		<div style='margin-left: 20px; margin-top: 370px;'>
			<object type="application/x-shockwave-flash" data="http://flv-mp3.com/i/pic/ump3player_500x70.swf"
					height="70" width="470"><param name="wmode" value="transparent" />
				<param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="http://flv-mp3.com/i/pic/ump3player_500x70.swf" />
				<param name="FlashVars" value="way=<?=getNextUrl()?>&amp;swf=http://flv-mp3.com/i/pic/ump3player_500x70.swf&amp;w=470&amp;h=70&amp;time_seconds=0&amp;autoplay=0&amp;q=&amp;skin=sky&amp;volume=70&amp;comment=" />
			</object>
		</div>
	</div>
</div>
