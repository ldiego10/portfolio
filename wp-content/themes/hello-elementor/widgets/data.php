<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Data extends Widget_Base{

  public function get_name(){
    return 'data';
  }

  public function get_title(){
    return 'Data';
  }

  public function get_icon(){
    return 'eicon-text';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Título',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Título de ejemplo'
      ]
    );

   

    $this->add_control(
      'content',
      [
        'label' => 'Contenido',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'Contenido.'
      ]
    );

    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['data__label-heading'],
      ]
    );

    ?>
    <style>
.data{
border: solid #B3A3A3FC;
border-width: 2px;
    border-radius: .85rem;
}

	.data__label-heading {
  padding: .5rem 1.25rem;
    background-color: #000;
    color: #E1DECE;
    width: 100%;
    font-weight: 500;
    font-size: 1.5rem;
font-family: 'Josefin Sans';font-size: 22px;
    border-radius: .85rem;
}


.data__content {
    padding: 1rem;
    background-color: #000;
    color: #E1DECE;
font-family: 'Josefin Sans';font-size: 22px;
    font-size: 1rem;
border-radius: .85rem;
}

	</style>

    <div class="data">
      <div <?php echo $this->get_render_attribute_string('label_heading'); ?>>
        <?php echo $settings['label_heading']?>
      </div>
      <div class="data__content">
  
        <div class="data__content__copy" <?php echo $this->get_render_attribute_string('content'); ?>>
          <?php echo $settings['content'] ?>
        </div>
      </div>
    </div>
    <?php
  }

  protected function _content_template(){
    ?>

    <style>
.data{
border: solid #B3A3A3FC;
border-width: 2px;
    border-radius: .85rem;
}

	.data__label-heading {
  padding: .5rem 1.25rem;
    background-color: #000;
    color: #E1DECE;
    width: 100%;
    font-weight: 500;
    font-size: 1.5rem;
font-family: 'Josefin Sans';font-size: 22px;
    border-radius: .85rem;
}


.data__content {
    padding: 1rem;
    background-color: #000;
    color: #E1DECE;
font-family: 'Josefin Sans';font-size: 22px;
    font-size: 1rem;
border-radius: .85rem;
}

	</style>
    <#
        view.addInlineEditingAttributes( 'label_heading', 'basic' );
    view.addRenderAttribute(
        'label_heading',
        {
            'class': [ 'data__label-heading' ],
        }
    );
        #>
        <div class="data">
      <div {{{ view.getRenderAttributeString( 'label_heading' ) }}}>{{{ settings.label_heading }}}</div>
      <div class="data__content">
        <div class="data__content__copy">
          {{{ settings.content }}}
        </div>
      </div>
    </div>
        <?php
  }
}