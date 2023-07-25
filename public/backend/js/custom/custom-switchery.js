!(function ($) {
    var danger_multicolor_on_off = document.querySelector(
        ".js-switch-danger-multicolor-on-off"
    );
    var switchery = new Switchery(danger_multicolor_on_off, {
        color: "#ff3f3f",
        secondaryColor: "#18d26b",
        jackColor: "#ffe4e6",
        jackSecondaryColor: "#a5ecc4",
        size: 'small',
    });
})(window.jQuery);
