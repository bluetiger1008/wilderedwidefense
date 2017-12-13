<?php 
/*
Template Name: Home Page
Template Post Type: post, page, event
*/
?>
<div class="hero">
    <img src="<?php the_field('hero_image') ?>" class="hero-background">
    <img src="<?php the_field('man_image') ?>" class="img-man">
    <div class="hero-text">
        <ul id="slides">
            <li class="slide showing">
                <h1><?php the_field('hero_title') ?></h1>
                <p><?php the_field('hero_description') ?></p>
                <a href="" class="button btn-red btn-rounded">Get Started Now</a>
            </li>
            <li class="slide">
                <h1>Slide 2</h1>
                <p>lorem ipsum</p>
            </li>
            <li class="slide">
                <h1>Slide 3</h1>
                <p>lorem ipsum</p>
            </li>
        </ul>
    </div>
</div>