<table>
<?php

$authors = explode(', ', wp_list_authors('html=0&echo=0& show_fullname=1') );

$exclude[] = "guest";


foreach($authors as $a ){

	$a = strtolower(str_replace(' ', '', $a));
	if( !in_array( $a, $exclude ) ){
		$auth = '';
		$auth = get_user_by('login',$a);
		
		if( $auth -> twitter != '' )
			$twitter = $auth -> twitter == '' ? '' : '<span>Twitter: <a href="http://twitter.com/' . $auth -> twitter . '">@' . $auth -> twitter . '</a>';
		
		$hash = md5(strtolower(trim($auth -> user_email)));
		?>
		<tr>
			<td valign="top">
				<a href="http://www.denveroffthewagon.com/author/<?= $auth -> nickname ?>"><img src="http://www.gravatar.com/avatar/<?= $hash ?>" title=""/></a>
			</td>
			<td valign="top">
				<strong><a href="http://www.denveroffthewagon.com/author/<?= $auth -> nickname ?>"><?= $auth -> display_name ?></a></strong>
	
				<p><?= $auth -> description ?></p>

				<?= $twitter ?>
			</td>
		
		</tr>
		<?php
	} // if
} // for


?>
</table>
</div>
&nbsp;