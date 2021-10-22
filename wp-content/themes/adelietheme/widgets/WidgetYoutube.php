<?php
class WidgetYoutube extends WP_Widget {
    public function __construct()
    {
        parent::__construct('youtube_widget', 'Youtube Widget'); 
    }
    public function widget($arg, $instance)
    {

    }
    public function form($instance){
        ?>
        <p>
        <label for="<?php $this->get_field_id('title') ?>">Titre</label>
        <input 
            class="widefat"
            type="text" 
            value="<?php esc_attr($instance) ?>"
            name="<?php $this->get_field_name('title') ?>"
            id="<?php $this->get_field_name('title') ?>">
        </p>
        <?php
    }
    public function update($newInstance, $oldInstance)
    {
        return $newInstance;
    }
}