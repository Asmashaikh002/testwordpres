function Businesswp_homepage_sections_scroll( section_id ){
    var scroll_section_id = "slider";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-businesswp_slider_section':
        scroll_section_id = "slider";
        break;

        case 'accordion-section-businesswp_service_section':
        scroll_section_id = "service";
        break;

         case 'accordion-section-businesswp_about_section':
        scroll_section_id = "about";
        break;

        case 'accordion-section-businesswp_contact_section':
        scroll_section_id = "contact";
        break;

        case 'accordion-section-businesswp_newsletter_section':
        scroll_section_id = "newsletter";
        break;

        case 'accordion-section-businesswp_counter_section':
        scroll_section_id = "counter";
        break;

        case 'accordion-section-businesswp_portfolio_section':
        scroll_section_id = "prortfolio";
        break;

        case 'accordion-section-businesswp_callout_section':
        scroll_section_id = "callout";
        break;

        case 'accordion-section-businesswp_pricing_section':
        scroll_section_id = "pricing";
        break;

        case 'accordion-section-businesswp_testimonial_section':
        scroll_section_id = "testimonial";
        break;

        case 'accordion-section-businesswp_team_section':
        scroll_section_id = "team";
        break;
		
		case 'accordion-section-businesswp_blog_section':
        scroll_section_id = "news";
        break;
		
		case 'accordion-section-businesswp_client_section':
        scroll_section_id = "client";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

jQuery('body').on('click', '#sub-accordion-panel-frontpage_panel .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        Businesswp_homepage_sections_scroll( section_id );
});