// JavaScript Document

!function ($) {

  $(function(){
	  
    // Disable certain links in docs
    $('section [href^=#]').click(function (e) {
      e.preventDefault()
    })

    // tooltip demo
    $('.container').tooltip({
      selector: "a[rel=tooltip]"
    })

    // popover demo
    $("a[rel=popover]")
      .popover()
      .click(function(e) {
        e.preventDefault()
      })
  })
  
}(window.jQuery)