<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'wp_driving_school'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _ex('Search for:', 'label', 'wp_driving_school');?>">
    </label>
    <input type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x('Search', 'submit button', 'wp_driving_school'); ?>">
</form>



