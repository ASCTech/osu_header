jQuery(document).ready(function(){
  var navbarHTML = '<div id="osu-Navbar"><div id="osu-NavbarBreadcrumb"><p id="osu"><a title="The Ohio State University homepage" href="http://www.osu.edu/">The Ohio State University</a></p></div><div id="osu-NavbarLinks"><ul><li><a href="http://www.osu.edu/help.php" title="OSU Help">Help</a></li><li><a href="http://buckeyelink.osu.edu/" title="Buckeye Link">Buckeye Link</a></li><li><a href="http://www.osu.edu/map/" title="Campus map">Map</a></li><li><a href="http://www.osu.edu/findpeople.php" title="Find people at OSU">Find People</a></li><li><a href="https://webmail.osu.edu" title="OSU Webmail">Webmail</a></li><li><a href="https://osu.edu/search" title="Search Ohio State">Search Ohio State</a></li></ul></div></div>';
  
  if (jQuery('div#osu-Navbar').length == 0) {
    jQuery("body").prepend(navbarHTML);
  }

  if (typeof osuNavBackgroundColor != "undefined") {
    jQuery("div#osu-Navbar").css('background-color', osuNavBackgroundColor);
  }

});
