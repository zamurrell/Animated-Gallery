## WordPress Animated Gallery (Not Using Elementor)
This project walks you through how to create an animated gallery on your WordPress site/theme, which will display four images in a masonry gallery layout, and at an interval set by the user, animate out one of those four images and replace it with an undisplayed image.

## DEMO

![Animated Gallery Demo](https://i.imgur.com/kgxPDkF.gif)

To start, download Advanced Custom Fields Pro. Once downloaded, navigate to "CPT UI" in the WordPress dashboard. Add a post type

Here's an example of the attributes I gave to my post type:
name: gallery
label: Galleries
singular_label: Gallery
description: ""
public: true
publicly_queryable: false
show_ui: true
show_in_nav_menus: false
delete_with_user: false
show_in_rest: true
rest_base: ""
rest_controller_class: ""
has_archive: false
has_archive_string: ""
exclude_from_search: true
capability_type: post
hierarchical: false
rewrite: true
rewrite_slug: ""
rewrite_withfront: true
query_var: true
query_var_slug: ""
menu_position: ""
show_in_menu: true
show_in_menu_string: ""
menu_icon: ""
custom_supports: ""

menu_name: My Galleries
all_items: All Galleries
add_new: Add new
add_new_item: Add new Gallery
edit_item: Edit Gallery
new_item: New Gallery
view_item: View Gallery
view_items: View Galleries
search_items: Search Galleries
not_found: No Galleries found
not_found_in_trash: No Galleries found in trash
featured_image: Featured image for this Gallery
set_featured_image: Set featured image for this Gallery
remove_featured_image: Remove featured image for this Gallery
use_featured_image: Use as featured image for this Gallery
archives: Gallery archives
insert_into_item: Insert into Gallery
uploaded_to_this_item: Upload to this Gallery
filter_items_list: Filter Galleries list
items_list_navigation: Galleries list navigation
items_list: Galleries list
attributes: Galleries attributes
name_admin_bar: Gallery
item_published: Gallery published
item_published_privately: Gallery published privately.
item_reverted_to_draft: Gallery reverted to draft.
item_scheduled: Gallery scheduled
item_updated: Gallery updated.
parent_item_colon: Parent Gallery:


Once the post type is created, go to custom fields, and add a field group. Give it two fields, one called 'interval' and one called 'gallery2'. 'Interval' should be of type number, 'gallery2' should be of type Repeater. Within 'gallery2', create a subfield of type image called 'gallery-image.' You're almost there!

Go to 'functions.php' in this repository and follow the instructions. Finally, add the file 'gallery.js' from this repository and add it in the '/assets/js' if you haven't already done so.

Now just go to "My Galleries" (May be named differently based on what you specify when creating your post type) in the WordPress dashboard, and create a new gallery. Fill in the interval with a time in milliseconds, and add your images. Your gallery will now work! Use the shortcode you specified in your functions.php file (probably gallery1) within elementor or the normal editor to insert your gallery on your site!

Don't forget to insert the styles from styles.css to your css file in your theme.

