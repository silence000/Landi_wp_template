<?php
// 一、不要长时间链接
function get_ssl_avatar($avatar) {
 //$avatar = preg_replace('/.*/avatar/(.*)?s=([d]+)&.*/','<img class="avatar avatar-$2" src="https://secure.gravatar.com/avatar/$1?s=$2" alt="" width="$2" height="$2" />',$avatar);
   return $avatar;
};
add_filter('get_avatar', 'get_ssl_avatar');
// 二、缩略图添加
if ( function_exists( 'add_theme_support' ) )   add_theme_support( 'post-thumbnails' );

// 三、获取内容的第一张图
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//四、获取文章中第一张图片的路径并输出
$first_img = $matches [1] [0];
//五、如果文章无图片，获取自定义图片
if(empty($first_img)){ //Defines a default image
$first_img = "/images/default.jpg";
//请自行设置一张default.jpg图片
}
return $first_img;
}
//六、禁止系统和插件更新
add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); // 关闭核心提示
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示
add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;")); // 关闭主题提示
remove_action('admin_init', '_maybe_update_core');    // 禁止 WordPress 检查更新
remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
remove_action('admin_init', '_maybe_update_themes');  // 禁止 WordPress 更新主题

//七、设置摘要字数
function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//八、分页插件
//调用分页方法  <div class="page_navi fqj_fenye">   php par_pagenavi(9); </div>中间加php标记符号
function par_pagenavi($range = 9){
        global $paged, $wp_query;
        if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
        if($max_page > 1){if(!$paged){$paged = 1;}
        if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";}
        previous_posts_link(' 上一页 ');
        if($max_page > $range){
            if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
            if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        elseif($paged >= ($max_page - ceil(($range/2)))){
            for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
            if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
            for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
        else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        next_posts_link(' 下一页 ');
        if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";}}
    }
//九、屏蔽后台更新功能
function wp_hide_nag() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','wp_hide_nag');
//十、屏蔽后台logo
function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);


//十一、文章首行缩进
// function Bing_text_indent($text){
// 	$return = str_replace('<p', '<p style="text-indent:2em;"',$text);
// 	return $return;
// 	}
// 	add_filter('the_content','Bing_text_indent');

// 十二、替换后台管理员头像
function wpyou_get_ssl_avatar($avatar) {
$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
return $avatar;
}
add_filter('get_avatar', 'wpyou_get_ssl_avatar');
//十三、WordPress 后台管理菜单名称重命名的方法
function change_post_menu_label() {
global $menu;
$menu[2][0] = '后台首页';
}
function change_post_object_label() {

}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
//十四、移除 WordPress 仪表盘欢迎面板
remove_action('welcome_panel', 'wp_welcome_panel');
//十五、面包屑插件  调用插件方法 php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs(); 前后加php标记符号
function cmp_breadcrumbs() {
	$delimiter = '>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( '当前位置：' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}

// //十六 、去除头部无用的加载
//     remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
//     remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
//     remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
//     remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
//     remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
//     remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
//     remove_action('wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
//     remove_action('wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
//     remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
//     remove_action( 'wp_head', 'locale_stylesheet' );
//     remove_action('publish_future_post','check_and_publish_future_post',10, 1 );
//     remove_action( 'wp_head', 'noindex', 1 );
//     remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
//     remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
//     remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
//     remove_action( 'wp_head', 'rel_canonical' );
//     remove_action( 'wp_footer', 'wp_print_footer_scripts' );
//     remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
//     remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
//     add_action('widgets_init', 'my_remove_recent_comments_style');
//     function my_remove_recent_comments_style() {
//     global $wp_widget_factory;
//     remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
//     }

//     //禁止加载WP自带的jquery.js
//     if ( !is_admin() ) { // 后台不禁止
 //    function my_init_method() {
//     wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
 //    }
//    add_action('init', 'my_init_method');
//     }
//     wp_deregister_script( 'l10n' );


	 //十七、获取菜单  
    if(function_exists('register_nav_menus')){    
        
    register_nav_menus(    
    array(    
    'header-menu' => __( '导航自定义菜单' ),    
    'footer-menu' => __( '页角自定义菜单' ),    
    'sider-menu' => __('侧边栏菜单')    
    )    
    );    
    }    
//十七、开启小工具

  

if ( function_exists('register_sidebar') )

    register_sidebar(array(

        'before_widget' => '<div class="sidebox">    ',

        'after_widget' => '</div>',

        'before_title' => '<h2>',

        'after_title' => '</h2>',

    ));

	
	

