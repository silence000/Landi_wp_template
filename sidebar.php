<div class="categoryleft">
	<ul>
		<li>
			<?php 
if(get_category_children(get_query_var("cat")) != ""){
wp_list_cats("child_of=" . get_query_var("cat") . "&depth=1&hide_empty=0&orderby=order"); 

}else{
	if(is_single()) {
		$cate = get_the_category();
		echo '<a href="?cat=' . $cate[0]->cat_ID . '">' . $cate[0]->cat_name . '</a>';
	}elseif(is_page()){
		echo '<a href="#">';
		echo the_title();
		echo '</a>';
	}elseif(is_category()){
		$catID = get_query_var('cat');

		$thisCat = get_category($catID);
		$parentCat = get_category($thisCat->parent);

		$cat = get_category($parentCat->term_id);
		echo '<a href="'.get_category_link($parentCat->term_id).'">';
		echo $cat->name;
		echo '</a>';
	}

}

?>
		</li>
	</ul>
</div>