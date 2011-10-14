<?php

function add_facebook_slider_js($culture,$locale = null)
{
  $fb_culture = 'en_US';
  if(strlen($culture) == 2) //if short culture ie: 'en' or 'pl' make if fb compatibile
    {
      //if locale is null we try to use culture. FB uses string for example en_US or pl_PL
      if($locale == null)
	{
	  $fb_culture = $culture.'_'.strtoupper($culture);
	}
      else
	{
	  $fb_culture = $culture.'_'.$locale;
	}
    }

  $script = sprintf(<<<EOF
		    <script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/%s/all.js#xfbml=1&appId=%s";
			fjs.parentNode.insertBefore(js, fjs);
		      }(document, 'script', 'facebook-jssdk'));
		    </script>
EOF
		    ,$fb_culture
		    ,sfConfig::get('app_facebook_slider_app_id')
		    );
  
  return $script; 
}

function render_facebook_slider()
{
  $html = sprintf(<<<EOF
		  <div id="facebook">
		  <div id="facebook_slider" style="float:left;display:block; margin-left:0px;">
		  <div id="fb-root"></div>

		  <div class="%s" style="%s" data-href="%s" data-width="%s" data-height="%s" data-show-faces="%s" data-colorscheme="%s" data-stream="%s" data-header="%s"></div>
		  </div>
		  </div>
EOF
		  ,sfConfig::get('app_facebook_slider_class')
		  ,sfConfig::get('app_facebook_slider_style')
		  ,sfConfig::get('app_facebook_slider_data_href')
		  ,sfConfig::get('app_facebook_slider_data_width',180)
		  ,sfConfig::get('app_facebook_slider_data_height',380)
		  ,sfConfig::get('app_facebook_slider_data_show_faces',"true")
		  ,sfConfig::get('app_facebook_slider_data_colorscheme',"white")
		  ,sfConfig::get('app_facebook_slider_data_stream',"false")
		  ,sfConfig::get('app_facebook_slider_data_header',"true")
		  );
  return $html;
}