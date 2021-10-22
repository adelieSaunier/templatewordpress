<?php 


function adelietheme_supports(){
    add_theme_support('post-thumbnails');
    register_nav_menu('main', 'menu principal');
    add_theme_support( 'custom-logo');
	add_theme_support( 'widgets');

}


function adelietheme_register_assets(){
    //wp_register_style('bootsrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
    //wp_register_script('bootsrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js'/*, ['popper','jquery'], false, true*/);
    //wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', false, true);
    //wp_deregister_script('jquery');
    //wp_register_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js',[], false, true );
    wp_enqueue_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('moncss', get_stylesheet_uri());
    wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js',[], false, true );
    wp_enqueue_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js',['jquery'], false, true);
}

function adelietheme_title_separator(){
    return '|';
}

function adelietheme_document_title_parts($title){
    var_dump($title);
    die();
}

function adelietheme_menu_class($classes){
    // rajouter un élément à la fin
    $classes[] = 'nav-item';
    return $classes;
}

//ajout de la class bootstrap à nos liens
function adelietheme_menu_attr($attrs){
    $attrs['class'] ='nav-link';
    return $attrs;
}


function adelietheme_custom_post_type(){
	// TAG = ATTITUDES
	$taxoLabel = [
		'name' => 'attitudes',
		'singular_name' => 'attitude',
		'parent_item' => null,
		'parent_item_colon' => null,
		'menu_name' => 'attitude',
		'search_items' => 'Recherches des attitudes',
		'add_new_item' => 'ajouter une attitude',
		'all_items' => 'Toutes les attitudes',
		'edit_item' => 'Editer une attitude',
		'update_item' => 'update attieude',
		'new_item_name' => 'nom de la nouvelle attitude'
	];

	register_taxonomy('attitudes',['sound', 'image', 'volume', 'web', 'fashion', 'writing', 'exhibition'],[
		'label'=> 'attitudes',
		'labels'=> $taxoLabel,
		'public'=> true,
		'has_archive' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true
	]);

	// SOUND
    $postLabels = array(
		// Le nom au pluriel
		'name'                => _x( 'Sound-Projects', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Sound-Project', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'SOUND'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'All sounds'),
		'view_item'           => __( 'View all sounds'),
		'add_new_item'        => __( 'add a new sound'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a sound'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$args = array(
		'label'               => __( 'sound'),
		'description'         => __( 'All sounds'),
        'menu_icon'           => __('dashicons-controls-play'),
		'labels'              => $postLabels,
		// définition options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'sound'),
		'taxonomies'		  => ['attitudes']
	);

	//IMAGE
	$imageLabels = array(
		'name'                => _x( 'Image-Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Image-Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'IMAGE'),
		'all_items'           => __( 'All Image Projects'),
		'view_item'           => __( 'View all Image Projects'),
		'add_new_item'        => __( 'add a new Image Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a Image Designer'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$imageargs = array(
		'label'               => __( 'image'),
		'description'         => __( 'All Image Projects'),
        'menu_icon'           => __('dashicons-tablet'),
		'labels'              => $imageLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'image'),
		'taxonomies'		  => ['attitudes']
	);

	//VOLUME 
	$volumeLabels = array(
		'name'                => _x( 'Volume-Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Volume-Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'VOLUME'),
		'all_items'           => __( 'All Volume Projects'),
		'view_item'           => __( 'View all Volume Projects'),
		'add_new_item'        => __( 'add a new Volume Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a Volume Project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$volumeargs = array(
		'label'               => __( 'volume'),
		'description'         => __( 'All Volume Projects'),
        'menu_icon'           => __('dashicons-editor-removeformatting'),
		'labels'              => $volumeLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'volume'),
		'taxonomies'		  => ['attitudes']
	);

	//WEB
	$webLabels = array(
		'name'                => _x( 'Web-Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Web-Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'WEB'),
		'all_items'           => __( 'All Web Projects'),
		'view_item'           => __( 'View all Web Projects'),
		'add_new_item'        => __( 'add a new Web Projects'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a Web Project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$webargs = array(
		'label'               => __( 'web'),
		'description'         => __( 'All Web Projects'),
        'menu_icon'           => __('dashicons-laptop'),
		'labels'              => $webLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'web'),
		'taxonomies'		  => ['attitudes']
	);

	//FASHION
	$fashionLabels = array(
		'name'                => _x( 'Fashion Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Fashion Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'FASHION'),
		'all_items'           => __( 'All Fashion Projects'),
		'view_item'           => __( 'View all Fashion Projects'),
		'add_new_item'        => __( 'add a new Fashion Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a fashion project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$fashionargs = array(
		'label'               => __('fashion'),
		'description'         => __('All fashion Projects'),
        'menu_icon'           => __('dashicons-products'),
		'labels'              => $fashionLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'fashion'),
		'taxonomies'		  => ['attitudes']
	);

	//WRITING
	$writtingLabels = array(
		'name'                => _x( 'Writing Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Writing Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'WRITING'),
		'all_items'           => __( 'All Writing Projects'),
		'view_item'           => __( 'View all Writing Projects'),
		'add_new_item'        => __( 'add a new Writing Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search a Writing project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$writtingargs = array(
		'label'               => __( 'writing'),
		'description'         => __( 'All Writing Projects'),
        'menu_icon'           => __('dashicons-book-alt'),
		'labels'              => $writtingLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'writing'),
		'taxonomies'		  => ['attitudes']
	);

	//EXHIBITION
	$exhibitLabels = array(
		'name'                => _x( 'Exhibition Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Exhibition Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'EXHIBITION'),
		'all_items'           => __( 'All Exhibition Projects'),
		'view_item'           => __( 'View all Exhibition Projects'),
		'add_new_item'        => __( 'add a new Exhibition Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search an Exhibition Project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$exhibitargs = array(
		'label'               => __( 'exhibition'),
		'description'         => __( 'All Exhibitions Projects'),
        'menu_icon'           => __('dashicons-clock'),
		'labels'              => $exhibitLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'exhibition'),
		'taxonomies'		  => ['attitudes']
	);

	//GAME
	$gameLabels = array(
		'name'                => _x( 'Game-Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Game-Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'GAME'),
		'all_items'           => __( 'All Game-Projects'),
		'view_item'           => __( 'View all Game-Projects'),
		'add_new_item'        => __( 'add a new Game-Project'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer'),
		'update_item'         => __( 'Modifier'),
		'search_items'        => __( 'Search an Game-Project'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	$gameargs = array(
		'label'               => __( 'Game'),
		'description'         => __( 'All Game Projects'),
        'menu_icon'           => __('dashicons-clock'),
		'labels'              => $gameLabels,
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ],
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'exhibition'),
		'taxonomies'		  => ['attitudes']
	);
	// enregistrement des sections pour l'utilisateurs qui souhaite rajouter un artiste et un projet
	//BASE DE DONNÉES
	register_post_type( 'sound', $args );
	register_post_type( 'image', $imageargs );
	register_post_type( 'volume', $volumeargs );
	register_post_type( 'web', $webargs );
	register_post_type( 'fashion', $fashionargs );
	register_post_type( 'writing', $writtingargs );
	register_post_type( 'exhibition', $exhibitargs );
	register_post_type( 'game', $gameargs );
}

require_once 'widgets/WidgetYoutube.php';

function adelietheme_register_widget()
{
	register_widget(WidgetYoutube::class);
	register_sidebar([
		'id' => 'homepage',
		'name' => 'Sidebar Accueil',
		'before_widget' => '<div class="p-4 %2$s" id="%1$">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class= "font-italic">',
		'after_title' => '</h4>'
	]);
}


add_action('after_setup_theme', 'adelietheme_supports');
add_action('wp_enqueue_scripts', 'adelietheme_register_assets');
add_action( 'init', 'adelietheme_custom_post_type');
add_action('widgets_init','adelietheme_register_widget');

//le hook charge ici les classes du menu
add_filter('nav_menu_css_class', 'adelietheme_menu_class');

//le hook rajoute l'attribut sur le lien a dans le menu
add_filter('nav_menu_link_attributes', 'adelietheme_menu_attr');

add_filter('document_filter_separator','adelietheme_title_separator');
add_filter('document_title_parts','adelietheme_document_title_parts');


