<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
 	<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
 	<style>
 		h1, h2, h3, h4, h5, .navbar-default .navbar-nav>li>a {
 			font-family: 'Cinzel', serif;
		    -webkit-text-stroke: .2px;
		    font-kerning: normal;
		    font-variant-ligatures: common-ligatures,contextual,discretionary-ligatures;
		    font-feature-settings: "kern","liga","clig","calt","dlig";
 		}

 		.home-hero_title {
 			font-weight: 600;
		    text-shadow: 0 0 2px rgba(255, 255, 255, 0.59);
		    letter-spacing: 2px;
 		}

 		.wrap {
 			    padding-top: 90px;
 		}

 		.overlay {
		    background: -webkit-linear-gradient(top,rgba(50, 94, 107, 0.6) 30%,rgba(133, 93, 68, 0.07));
		    background: linear-gradient(180deg,rgba(50, 94, 107, 0.6) 30%,rgba(133, 93, 68, 0.07));
		}

			.home-hero_title {
			    -webkit-text-stroke: 0px;
			        text-shadow: 0 0 2px rgba(0, 0, 0, 0.06);
			}
			.home-hero_subtitle, .home-hero_title {

	    line-height: 1.6;
	}

		.home-hero {
		    padding-top: 100px;

		}

		@media (min-width: 992px) {
			.home-hero_title {
			    font-size: 44px;
			    line-height: 1.4;
			}
			.home-hero {
			    max-height: 670px;
			}

			.home-hero_subtitle {
				    margin-bottom: 55px;
			}
		}

		.home-hero_play-block > div {
			    box-shadow: 0 0 50px 10px rgba(0, 0, 0, 0.3);
    		border: 5px solid #fff;
		}
.heading-block {
    padding: 80px 0 60px;
}
.heading-block h2 {
    font-size: 32px;
    line-height: 1.8;

}

.heading-block p {
    color: rgba(0, 0, 0, 0.52);
}

.choose_table td.td-1 {
    background-color: hsla(0,0%,93%,.1);
}
.choose_table td.td-2 {
    background-color: hsla(0,0%,93%,.2);
}
.choose_table td.td-3 {
    background-color: hsla(0,0%,93%,.3);
}
.choose_table td.td-4 {
    background-color: hsla(0,0%,93%,.4);
}

.choose_table td:hover {
    background-color: hsla(0,0%,93%,.6) !important;
}

.story-slider .slide .logo-block {
    min-height: 100px;
    max-height: 100px;
    margin-top: 100px;
 	
}

@media (min-width: 768px) {

	.story-slider .slide .dark-block .text-wrap {
	   padding-right: 0;
	}
}

.story-slider .slide .dark-block {
    background: transparent;	

}

.story-slider .slide-1 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/slide-1.jpg);
}

.story-slider .slide-2 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/slide-2.jpg);
}

.story-slider .slide-3 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/slide-3.jpg);
}

.story-slider .slide-4 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/slide-4.jpg);
}

.story-slider .slide {
    min-height: 550px;
}

.story-slider .slide .dark-block .text-wrap {
    padding-right: 0;
    margin: 0 auto;
    width: 100%;
    /* display: block; */
    /* max-width: 1000px; */
    margin: 0 auto;
    background: rgb(250, 250, 250);
    color: rgba(0, 0, 0, 0.69);
    padding: 60px 60px 30px 90px;
    position: absolute;
    top: 300px;
    left: 0;
    display: block;
    height: inherit;
    box-shadow: 0 0 50px 10px rgba(0, 0, 0, 0.03);
    border: 5px solid #fff;
}

.text-wrap:before {
    display: block;
    content: "\201C";
    font-size: 80px;
    position: absolute;
    left: 30px;
    top: 20px;
    color: rgba(122, 122, 122, 0.32);
}

.story-slider .slide .dark-block h4 {
    color: #151515!important;
    font-style: italic;
}

.story-slider .slide .dark-block p {
    line-height: 1.4;
    margin: 0 0 10px;
    font-style: italic;
    color: rgba(0, 0, 0, 0.55);
}

section.story {
	padding-bottom: 	200px;
}

.owl-carousel .owl-stage-outer {
	overflow: 	visible;	
}

.story-slider .slide .dark-block h4 {
    color: #151515!important;

}

.story-slider .slide .btn-list {
    margin-top: 0;
}

.btn-list .btn {
    padding: 12px 24px 11px;
    font-size: 13px;
}

.btn-list .btn-default {
	    color: rgba(0, 0, 0, 0.55);
    background: transparent;
    border-color: rgba(0, 0, 0, 0.12);
}

.post-card-1 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/bad-advisors-new.jpg);
}

.post-card-2 {
    background-image: url(http://188.226.237.233/shared/financial-tax-architects/wp-content/themes/financial-tax-architects/dist/images/medicaid.jpg);
}

.post-card_category {
    font-size: 11px!important;
    letter-spacing: .2em!important;
    color: rgb(224, 224, 224)!important;

    font-weight: bold;
    /* font-family: 'Cinzel', serif; */
}

footer.content-info ul.nav-drop .nav-drop-item a {
    margin-bottom: 0;
    padding: .5em 0;
    font-size: 13px;
    color: rgba(0, 0, 0, 0.62);
    font-weight: 400;
    letter-spacing: 0;
}

</style>
</head>
