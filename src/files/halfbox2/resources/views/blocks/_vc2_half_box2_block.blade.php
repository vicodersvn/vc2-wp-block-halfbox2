<?php
    $id = 'halfbox2-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'halfbox2';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    if( $is_preview ) {
        $className .= ' is-admin';
    }

    $text_box = get_field('text_box');
    $heading_tab = get_field('heading_tab');
    $heading_color = get_field('heading_color');
    $padding_top = get_field('padding_top');
    $padding_bottom = get_field('padding_bottom');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="padding-top: {{$padding_top}}; padding-bottom: {{$padding_bottom}};">
    <div class="container">
        <div class="half-items nf-row half-row row">
            <div class="nf-col col-lg-5 col-md-12">
                @if (!empty($text_box))
                    <p class="text-box">
                        {{ $text_box }}
                    </p>
                @endif
            </div>
            <div class="nf-col col-lg-6 offset-lg-1 col-md-12">
                <div class="tab-content">
					<?php if (!empty($heading_tab)): ?>
                    <h3 class="heading" style="background-color: {{ $heading_color }};">{{ $heading_tab }}</h3>
                    <?php endif ?>
                    @if( have_rows('content_tabs') )
                    <ul class="tabs">
                        <?php while( have_rows('content_tabs') ): the_row(); 
                            $title_tab = get_sub_field('title_tab');
                        ?>
                            <li class="tab-menu">
                                <span class="title" style="color: {{ $heading_color }}"><span>{{ $title_tab }}</span><i class="fa fa-angle-down"></i></span>
                                @if( have_rows('detail_tabs') )
                                    <ul class="tab-child">
                                        <?php
                                        $i=1;
                                        while( have_rows('detail_tabs') ): the_row(); 
                                            $description_tab = get_sub_field('description_tab');
                                        ?>
                                        <li><span>{{$i}}. </span> {{ $description_tab }}</li>
                                        <?php 
                                        $i++;
                                        endwhile ?>
                                    </ul>
                                @endif
                            </li>  
                        <?php endwhile ?>
                    </ul>
                    @endif
                </div>
            </div>    
        </div>
    </div>
</div>