!function(a){"use strict";a.fn.fusion_set_bg_img_dims=function(){a(this).each(function(){var b,c,d;'<div class="fusion-clearfix"></div>'!==a.trim(a(this).html())&&""!==a.trim(a(this).html())||!a(this).data("bg-url")||(b=new Image,b.src=a(this).data("bg-url"),c=parseInt(b.naturalHeight),d=parseInt(b.naturalWidth),a(this).attr("data-bg-height",c),a(this).attr("data-bg-width",d))})},a.fn.fusion_calculate_empty_column_height=function(){a(this).each(function(){var b,c,d,e,f;(a(this).parents(".fusion-equal-height-columns").length&&(Modernizr.mq("only screen and (max-width: "+fusionBgImageVars.content_break_point+"px)")||!0===a(this).data("empty-column"))||!a(this).parents(".fusion-equal-height-columns").length)&&('<div class="fusion-clearfix"></div>'!==a.trim(a(this).html())&&""!==a.trim(a(this).html())||(b=a(this).data("bg-height"),c=a(this).data("bg-width"),d=a(this).outerWidth(),e=d/c,f=b*e,a(this).height(f),(a("html").hasClass("ua-edge")||a("html").hasClass("ua-ie"))&&a(this).parent().height(f)))})}}(jQuery);