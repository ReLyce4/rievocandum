element_id = "navbar"; //ID of the element in which do you want to add shadow

window.onscroll = function() {shadowBottomOnScroll(element_id)};
	function shadowBottomOnScroll(id) {
    	if ((document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) && typeof document.getElementsByClassName(id) !== 'undefined') {
            var element = document.getElementById(id);
			element.classList.add("shadow-bottom");
          } else {
            var element = document.getElementById(id);
            element.classList.remove("shadow-bottom");
          }
	}