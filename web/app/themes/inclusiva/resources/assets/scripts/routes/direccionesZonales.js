export default {
  init() {
    // JavaScript to be fired on the about us page
    // Direcciones Zonales SVG
    $( "[data-id]" ).on('mouseenter mouseleave', function () {
      $("[data-class=\"" + $(this).data("id") + "\"]").toggleClass("active");
    });

    // $( "[data-id]" ).hover(function(e) {
    //   $("[data-class=\"" + $(this).data("id") + "\"]").trigger(e.type);
    // });

    $( "[data-class]" ).on('mouseenter mouseleave', function () {
      $("[data-id=\"" + $(this).data("class") + "\"]").toggleClass("active");
    });
  },
};
