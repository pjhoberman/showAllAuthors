<table>
<?php

$authors = explode(', ', wp_list_authors('html=0&echo=0& show_fullname=1') );

$exclude[] = "guest";


foreach($authors as $a ){

	$a = strtolower(str_replace(' ', '', $a));
	if( !in_array( $a, $exclude ) ){
		$auth = get_user_by('login',$a);
	//	print_r( $auth );
		
		$hash = md5(strtolower(trim($auth -> user_email)));
		?>
		<tr>
			<td valign="top">
				<a href="http://www.denveroffthewagon.com/author/<?= $auth -> nickname ?>"><img src="http://www.gravatar.com/avatar/<?= $hash ?>" title=""/></a>
			</td>
			<td valign="top">
				<strong><a href="http://www.denveroffthewagon.com/author/<?= $auth -> nickname ?>"><?= $auth -> display_name ?></a></strong>
	
				<p><?= $auth -> description ?></p>
			</td>
		
		</tr>
		<?php
	} // if
} // for


?>
</table>